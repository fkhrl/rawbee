<?php

namespace App\Http\Controllers;

use App\Slider;
use App\AdminLog;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $moduleName="Slider";
    private $sdc;
    public function __construct(){ $this->sdc = new CoreCustomController(); }
    
    public function index(){
        $tab=Slider::all();
        return view('admin.pages.slider.slider_list',['dataRow'=>$tab]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){


                   
        return view('admin.pages.slider.slider_create');
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
        ]);

        $this->SystemAdminLog("Slider","Save New","Create New");

        

        $filename_slider_3='';
        if ($request->hasFile('image')) {
            $img_slider = $request->file('image');
            $upload_slider = 'upload/slider';
            $filename_slider_3 = env('APP_NAME').'_'.time() . '.' . $img_slider->getClientOriginalExtension();
            $img_slider->move($upload_slider, $filename_slider_3);
        }

                
        $tab=new Slider();
        
        $tab->title=$request->title;
        $tab->sub_title=$request->sub_title;
        $tab->short_detail=$request->short_detail;
        $tab->image=$filename_slider_3;
        $tab->button_title=$request->button_title;
        $tab->link=$request->link;
        $tab->position=$request->position;
        $tab->save();

        return redirect('slider')->with('status','Added Successfully !');

    }

    public function ajax(Request $request)
    {
        $this->validate($request,[
                
                'title'=>'required',
                'image'=>'required',
        ]);

        $tab=new Slider();
        
        $tab->title=$request->title;
        $tab->sub_title=$request->sub_title;
        $tab->short_detail=$request->short_detail;
        $tab->image=$filename_slider_3;
        $tab->button_title=$request->button_title;
        $tab->link=$request->link;
        $tab->position=$request->position;
        $tab->save();

        echo json_encode(array("status"=>"success","msg"=>"Added Successfully."));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */

    private function methodToGetMembersCount($search=""){

        $tab=Customer::select('id','name','address','phone','email','last_invoice_no','created_at')
                     ->where('store_id',$this->sdc->storeID())->orderBy('id','DESC')
                     ->when($search, function ($query) use ($search) {
                        $query->where('id','LIKE','%'.$search.'%');
                            $query->orWhere('title','LIKE','%'.$search.'%');
                            $query->orWhere('sub_title','LIKE','%'.$search.'%');
                            $query->orWhere('short_detail','LIKE','%'.$search.'%');
                            $query->orWhere('image','LIKE','%'.$search.'%');
                            $query->orWhere('button_title','LIKE','%'.$search.'%');
                            $query->orWhere('link','LIKE','%'.$search.'%');
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
                            $query->orWhere('sub_title','LIKE','%'.$search.'%');
                            $query->orWhere('short_detail','LIKE','%'.$search.'%');
                            $query->orWhere('image','LIKE','%'.$search.'%');
                            $query->orWhere('button_title','LIKE','%'.$search.'%');
                            $query->orWhere('link','LIKE','%'.$search.'%');
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

    
    public function SliderQuery($request)
    {
        $Slider_data=Slider::orderBy('id','DESC')->get();

        return $Slider_data;
    }
    
   

    public function ExportExcel(Request $request) 
    {
         $dataDateTimeIns=formatDateTime(date('d-M-Y H:i:s a'));
        $data=array();
        $array_column=array(
                                'ID','Title','Sub Title','Short Detail','Image','Button Title','Link','Created Date');
        array_push($data, $array_column);
        $inv=$this->SliderQuery($request);
        foreach($inv as $voi):
            $inv_arry=array(
                                $voi->id,$voi->title,$voi->sub_title,$voi->short_detail,$voi->image,$voi->button_title,$voi->link,formatDate($voi->created_at));
            array_push($data, $inv_arry);
        endforeach;

        $excelArray=array(
            'report_name'=>'Slider Report',
            'report_title'=>'Slider Report',
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
                        
                            <th class='text-center' style='font-size:12px;' >Sub Title</th>
                        
                            <th class='text-center' style='font-size:12px;' >Short Detail</th>
                        
                            <th class='text-center' style='font-size:12px;' >Image</th>
                        
                            <th class='text-center' style='font-size:12px;' >Button Title</th>
                        
                            <th class='text-center' style='font-size:12px;' >Link</th>
                        
                <th class='text-center' style='font-size:12px;'>Created Date</th>
                </tr>
                </thead>
                <tbody>";

                    $inv=$this->SliderQuery($request);
                    foreach($inv as $voi):
                        $html .="<tr>
                        <td style='font-size:12px;' class='text-center'>".$voi->id."</td>
                        <td style='font-size:12px;' class='text-center'>".$voi->title."</td>
                        <td style='font-size:12px;' class='text-center'>".$voi->sub_title."</td>
                        <td style='font-size:12px;' class='text-center'>".$voi->short_detail."</td>
                        <td style='font-size:12px;' class='text-center'>".$voi->image."</td>
                        <td style='font-size:12px;' class='text-center'>".$voi->button_title."</td>
                        <td style='font-size:12px;' class='text-center'>".$voi->link."</td>
                        <td style='font-size:12px; text-align:center;' class='text-center'>".formatDate($voi->created_at)."</td>
                        </tr>";

                    endforeach;


                $html .="</tbody>
                
                </table>


                ";

                $this->sdc->PDFLayout('Slider Report',$html);


    }
    public function show(Slider $slider)
    {
        
        $tab=Slider::all();return view('admin.pages.slider.slider_list',['dataRow'=>$tab]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider,$id=0)
    {
        $tab=Slider::find($id);      
        return view('admin.pages.slider.slider_edit',['dataRow'=>$tab,'edit'=>true]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider,$id=0)
    {
        $this->validate($request,[
                
                'title'=>'required',
        ]);

        $this->SystemAdminLog("Slider","Update","Edit / Modify");

        

        $filename_slider_3=$request->ex_image;
        if ($request->hasFile('image')) {
            $img_slider = $request->file('image');
            $upload_slider = 'upload/slider';
            $filename_slider_3 = env('APP_NAME').'_'.time() . '.' . $img_slider->getClientOriginalExtension();
            $img_slider->move($upload_slider, $filename_slider_3);
        }

                
        $tab=Slider::find($id);
        
        $tab->title=$request->title;
        $tab->sub_title=$request->sub_title;
        $tab->short_detail=$request->short_detail;
        $tab->image=$filename_slider_3;
        $tab->button_title=$request->button_title;
        $tab->link=$request->link;
        $tab->position=$request->position;
        $tab->save();

        return redirect('slider')->with('status','Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider,$id=0)
    {
        $this->SystemAdminLog("Slider","Destroy","Delete");

        $tab=Slider::find($id);
        $tab->delete();
        return redirect('slider')->with('status','Deleted Successfully !');}
}
