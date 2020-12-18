<?php

namespace App\Http\Controllers;

use App\AboutUs;
use App\AdminLog;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $moduleName="About Us";
    private $sdc;
    public function __construct(){ $this->sdc = new CoreCustomController(); }
    
    public function index(){
        $tabCount=AboutUs::count();
        if($tabCount==0)
        {
            return redirect(url('aboutus/create'));
        }else{

            $tab=AboutUs::orderBy('id','DESC')->first();      
        return view('admin.pages.aboutus.aboutus_edit',['dataRow'=>$tab,'edit'=>true]); 
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){


        
        $tabCount=AboutUs::count();
        if($tabCount==0)
        {            
        return view('admin.pages.aboutus.aboutus_create');
            
        }else{

            $tab=AboutUs::orderBy('id','DESC')->first();      
        return view('admin.pages.aboutus.aboutus_edit',['dataRow'=>$tab,'edit'=>true]); 
        }
        
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
                
                'title'=>'required',
                'image'=>'required',
                'details'=>'required',
        ]);

        $this->SystemAdminLog("About Us","Save New","Create New");

        

        $filename_aboutus_1='';
        if ($request->hasFile('image')) {
            $img_aboutus = $request->file('image');
            $upload_aboutus = 'upload/aboutus';
            $filename_aboutus_1 = env('APP_NAME').'_'.time() . '.' . $img_aboutus->getClientOriginalExtension();
            $img_aboutus->move($upload_aboutus, $filename_aboutus_1);
        }

                
        $tab=new AboutUs();
        
        $tab->title=$request->title;
        $tab->image=$filename_aboutus_1;
        $tab->details=$request->details;
        $tab->save();

        return redirect('aboutus')->with('status','Added Successfully !');

    }

    public function ajax(Request $request)
    {
        $this->validate($request,[
                
                'title'=>'required',
                'image'=>'required',
                'details'=>'required',
        ]);

        $tab=new AboutUs();
        
        $tab->title=$request->title;
        $tab->image=$filename_aboutus_1;
        $tab->details=$request->details;
        $tab->save();

        echo json_encode(array("status"=>"success","msg"=>"Added Successfully."));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AboutUs  $aboutus
     * @return \Illuminate\Http\Response
     */

    private function methodToGetMembersCount($search=""){

        $tab=Customer::select('id','name','address','phone','email','last_invoice_no','created_at')
                     ->where('store_id',$this->sdc->storeID())->orderBy('id','DESC')
                     ->when($search, function ($query) use ($search) {
                        $query->where('id','LIKE','%'.$search.'%');
                            $query->orWhere('title','LIKE','%'.$search.'%');
                            $query->orWhere('image','LIKE','%'.$search.'%');
                            $query->orWhere('details','LIKE','%'.$search.'%');
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
                            $query->orWhere('title','LIKE','%'.$search.'%');
                            $query->orWhere('image','LIKE','%'.$search.'%');
                            $query->orWhere('details','LIKE','%'.$search.'%');
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

    
    public function AboutUsQuery($request)
    {
        $AboutUs_data=AboutUs::orderBy('id','DESC')->get();

        return $AboutUs_data;
    }
    
   

    public function ExportExcel(Request $request) 
    {
         $dataDateTimeIns=formatDateTime(date('d-M-Y H:i:s a'));
        $data=array();
        $array_column=array(
                                'ID','Title','Image','Details','Created Date');
        array_push($data, $array_column);
        $inv=$this->AboutUsQuery($request);
        foreach($inv as $voi):
            $inv_arry=array(
                                $voi->id,$voi->title,$voi->image,$voi->details,formatDate($voi->created_at));
            array_push($data, $inv_arry);
        endforeach;

        $excelArray=array(
            'report_name'=>'About Us Report',
            'report_title'=>'About Us Report',
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
                            <th class='text-center' style='font-size:12px;' >Title</th>
                        
                            <th class='text-center' style='font-size:12px;' >Image</th>
                        
                            <th class='text-center' style='font-size:12px;' >Details</th>
                        
                <th class='text-center' style='font-size:12px;'>Created Date</th>
                </tr>
                </thead>
                <tbody>";

                    $inv=$this->AboutUsQuery($request);
                    foreach($inv as $voi):
                        $html .="<tr>
                        <td style='font-size:12px;' class='text-center'>".$voi->id."</td>
                        <td style='font-size:12px;' class='text-center'>".$voi->title."</td>
                        <td style='font-size:12px;' class='text-center'>".$voi->image."</td>
                        <td style='font-size:12px;' class='text-center'>".$voi->details."</td>
                        <td style='font-size:12px; text-align:center;' class='text-center'>".formatDate($voi->created_at)."</td>
                        </tr>";

                    endforeach;


                $html .="</tbody>
                
                </table>


                ";

                $this->sdc->PDFLayout('About Us Report',$html);


    }
    public function show(AboutUs $aboutus)
    {
        
        $tab=AboutUs::all();return view('admin.pages.aboutus.aboutus_list',['dataRow'=>$tab]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AboutUs  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUs $aboutus,$id=0)
    {
        $tab=AboutUs::find($id);      
        return view('admin.pages.aboutus.aboutus_edit',['dataRow'=>$tab,'edit'=>true]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AboutUs  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUs $aboutus,$id=0)
    {
        $this->validate($request,[
                
                'title'=>'required',
                'details'=>'required',
        ]);

        $this->SystemAdminLog("About Us","Update","Edit / Modify");

        

        $filename_aboutus_1=$request->ex_image;
        if ($request->hasFile('image')) {
            $img_aboutus = $request->file('image');
            $upload_aboutus = 'upload/aboutus';
            $filename_aboutus_1 = env('APP_NAME').'_'.time() . '.' . $img_aboutus->getClientOriginalExtension();
            $img_aboutus->move($upload_aboutus, $filename_aboutus_1);
        }

                
        $tab=AboutUs::find($id);
        
        $tab->title=$request->title;
        $tab->image=$filename_aboutus_1;
        $tab->details=$request->details;
        $tab->save();

        return redirect('aboutus')->with('status','Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AboutUs  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $aboutus,$id=0)
    {
        $this->SystemAdminLog("About Us","Destroy","Delete");

        $tab=AboutUs::find($id);
        $tab->delete();
        return redirect('aboutus')->with('status','Deleted Successfully !');}
}
