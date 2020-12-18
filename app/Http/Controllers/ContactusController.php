<?php

namespace App\Http\Controllers;

use App\ContactUs;
use App\AdminLog;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $moduleName="Contact Us";
    private $sdc;
    public function __construct(){ $this->sdc = new CoreCustomController(); }
    
    public function index(){
        $tab=ContactUs::all();
        return view('admin.pages.contactus.contactus_list',['dataRow'=>$tab]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){


                   
        return view('admin.pages.contactus.contactus_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private function SystemAdminLog($module_name="",$action="",$details=""){
        $tab=new AdminLog();
        $tab->module_name=$module_name;
        $tab->action=$action;
        $tab->details=$details;
        $tab->admin_id=$this->sdc->admin_id();
        $tab->admin_name=$this->sdc->UserName();
        $tab->save();
    }


    public function store(Request $request)
    {
        $this->validate($request,[
                
                'name'=>'required',
                'email'=>'required',
                'mobile_number'=>'required',
                'organization_name'=>'required',
        ]);

        $this->SystemAdminLog("Contact Us","Save New","Create New");

        
        $tab=new ContactUs();
        
        $tab->name=$request->name;
        $tab->email=$request->email;
        $tab->mobile_number=$request->mobile_number;
        $tab->organization_name=$request->organization_name;
        $tab->message=$request->message;
        $tab->save();

        return redirect('contactus')->with('status','Added Successfully !');

    }

    public function ajax(Request $request)
    {
        $this->validate($request,[
                
                'name'=>'required',
                'email'=>'required',
                'mobile_number'=>'required',
                'organization_name'=>'required',
        ]);

        $tab=new ContactUs();
        
        $tab->name=$request->name;
        $tab->email=$request->email;
        $tab->mobile_number=$request->mobile_number;
        $tab->organization_name=$request->organization_name;
        $tab->message=$request->message;
        $tab->save();

        echo json_encode(array("status"=>"success","msg"=>"Added Successfully."));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactUs  $contactus
     * @return \Illuminate\Http\Response
     */

    private function methodToGetMembersCount($search=""){

        $tab=Customer::select('id','name','address','phone','email','last_invoice_no','created_at')
                     ->where('store_id',$this->sdc->storeID())->orderBy('id','DESC')
                     ->when($search, function ($query) use ($search) {
                        $query->where('id','LIKE','%'.$search.'%');
                            $query->orWhere('name','LIKE','%'.$search.'%');
                            $query->orWhere('email','LIKE','%'.$search.'%');
                            $query->orWhere('mobile_number','LIKE','%'.$search.'%');
                            $query->orWhere('organization_name','LIKE','%'.$search.'%');
                            $query->orWhere('message','LIKE','%'.$search.'%');
                            $query->orWhere('created_at','LIKE','%'.$search.'%');

                        return $query;
                     })
                     ->count();
        return $tab;
    }


    private function methodToGetMembers($start, $length,$search=''){

        $tab=Customer::select('id','name','address','phone','email','last_invoice_no','created_at')
                     ->where('store_id',$this->sdc->storeID())->orderBy('id','DESC')
                     ->when($search, function ($query) use ($search) {
                        $query->where('id','LIKE','%'.$search.'%');
                            $query->orWhere('name','LIKE','%'.$search.'%');
                            $query->orWhere('email','LIKE','%'.$search.'%');
                            $query->orWhere('mobile_number','LIKE','%'.$search.'%');
                            $query->orWhere('organization_name','LIKE','%'.$search.'%');
                            $query->orWhere('message','LIKE','%'.$search.'%');
                            $query->orWhere('created_at','LIKE','%'.$search.'%');

                        return $query;
                     })
                     ->skip($start)->take($length)->get();
        return $tab;
    }

    public function datatable(Request $request){

        $draw = $request->get('draw');
        $start = $request->get('start');
        $length = $request->get('length');
        $search = $request->get('search');

        $search = (isset($search['value']))? $search['value'] : '';

        $total_members = $this->methodToGetMembersCount($search); // get your total no of data;
        $members = $this->methodToGetMembers($start, $length,$search); //supply start and length of the table data

        $data = array(
            'draw' => $draw,
            'recordsTotal' => $total_members,
            'recordsFiltered' => $total_members,
            'data' => $members,
        );

        echo json_encode($data);

    }

    
    public function ContactUsQuery($request)
    {
        $ContactUs_data=ContactUs::orderBy('id','DESC')->get();

        return $ContactUs_data;
    }
    
   

    public function ExportExcel(Request $request) 
    {
         $dataDateTimeIns=formatDateTime(date('d-M-Y H:i:s a'));
        $data=array();
        $array_column=array(
                                'ID','Name','Email','Mobile Number','Organization Name','Message','Created Date');
        array_push($data, $array_column);
        $inv=$this->ContactUsQuery($request);
        foreach($inv as $voi):
            $inv_arry=array(
                                $voi->id,$voi->name,$voi->email,$voi->mobile_number,$voi->organization_name,$voi->message,formatDate($voi->created_at));
            array_push($data, $inv_arry);
        endforeach;

        $excelArray=array(
            'report_name'=>'Contact Us Report',
            'report_title'=>'Contact Us Report',
            'report_description'=>'Report Genarated : '.$dataDateTimeIns,
            'data'=>$data
        );

        $this->sdc->ExcelLayout($excelArray);
        
    }

    public function ExportPDF(Request $request)
    {

        $html="<table class='table table-bordered' style='width:100%;'>
                <thead>
                <tr>
                <th class='text-center' style='font-size:12px;'>ID</th>
                            <th class='text-center' style='font-size:12px;' >Name</th>
                        
                            <th class='text-center' style='font-size:12px;' >Email</th>
                        
                            <th class='text-center' style='font-size:12px;' >Mobile Number</th>
                        
                            <th class='text-center' style='font-size:12px;' >Organization Name</th>
                        
                            <th class='text-center' style='font-size:12px;' >Message</th>
                        
                <th class='text-center' style='font-size:12px;'>Created Date</th>
                </tr>
                </thead>
                <tbody>";

                    $inv=$this->ContactUsQuery($request);
                    foreach($inv as $voi):
                        $html .="<tr>
                        <td style='font-size:12px;' class='text-center'>".$voi->id."</td>
                        <td style='font-size:12px;' class='text-center'>".$voi->name."</td>
                        <td style='font-size:12px;' class='text-center'>".$voi->email."</td>
                        <td style='font-size:12px;' class='text-center'>".$voi->mobile_number."</td>
                        <td style='font-size:12px;' class='text-center'>".$voi->organization_name."</td>
                        <td style='font-size:12px;' class='text-center'>".$voi->message."</td>
                        <td style='font-size:12px; text-align:center;' class='text-center'>".formatDate($voi->created_at)."</td>
                        </tr>";

                    endforeach;


                $html .="</tbody>
                
                </table>


                ";

                $this->sdc->PDFLayout('Contact Us Report',$html);


    }
    public function show(ContactUs $contactus)
    {
        
        $tab=ContactUs::all();return view('admin.pages.contactus.contactus_list',['dataRow'=>$tab]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactUs  $contactus
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactus,$id=0)
    {
        $tab=ContactUs::find($id);      
        return view('admin.pages.contactus.contactus_edit',['dataRow'=>$tab,'edit'=>true]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactUs  $contactus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $contactus,$id=0)
    {
        $this->validate($request,[
                
                'name'=>'required',
                'email'=>'required',
                'mobile_number'=>'required',
                'organization_name'=>'required',
        ]);

        $this->SystemAdminLog("Contact Us","Update","Edit / Modify");

        
        $tab=ContactUs::find($id);
        
        $tab->name=$request->name;
        $tab->email=$request->email;
        $tab->mobile_number=$request->mobile_number;
        $tab->organization_name=$request->organization_name;
        $tab->message=$request->message;
        $tab->save();

        return redirect('contactus')->with('status','Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactUs  $contactus
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactus,$id=0)
    {
        $this->SystemAdminLog("Contact Us","Destroy","Delete");

        $tab=ContactUs::find($id);
        $tab->delete();
        return redirect('contactus')->with('status','Deleted Successfully !');}
}
