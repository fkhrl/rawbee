<?php

namespace App\Http\Controllers;

use App\OurProduct;
use App\AdminLog;
use Illuminate\Http\Request;
use App\Category;
                
use App\SubCategory;
use DB;
                

class OurProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $moduleName="Our Product";
    private $sdc;
    public function __construct(){ $this->sdc = new CoreCustomController(); }
    
    public function index(){
        $tab=OurProduct::all();
        return view('admin.pages.ourproduct.ourproduct_list',['dataRow'=>$tab]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $tab_Category=Category::all();
        $tab_SubCategory=SubCategory::all();           
        return view('admin.pages.ourproduct.ourproduct_create',['dataRow_Category'=>$tab_Category,'dataRow_SubCategory'=>$tab_SubCategory]);
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

    public function ajaxSubCat(Request $request) {

        $query = DB::table('sub_categories')->where('category', $request->div)->get();
        return response()->json($query);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
                
                'category'=>'required',
                'sub_category'=>'required',
                'name'=>'required',
                'details'=>'required',
        ]);

        $this->SystemAdminLog("Our Product","Save New","Create New");

        
        $tab_0_Category=Category::where('id',$request->category)->first();
        $category_0_Category=$tab_0_Category->name;
        $tab_1_SubCategory=SubCategory::where('id',$request->sub_category)->first();
        $sub_category_1_SubCategory=$tab_1_SubCategory->name;

        $filename_ourproduct_3='';
        if ($request->hasFile('image')) {
            $img_ourproduct = $request->file('image');
            $upload_ourproduct = 'upload/ourproduct';
            $filename_ourproduct_3 = env('APP_NAME').'_'.time() . '.' . $img_ourproduct->getClientOriginalExtension();
            $img_ourproduct->move($upload_ourproduct, $filename_ourproduct_3);
        }

                
        $tab=new OurProduct();
        
        $tab->category_name=$category_0_Category;
        $tab->category=$request->category;
        $tab->sub_category_name=$sub_category_1_SubCategory;
        $tab->sub_category=$request->sub_category;
        $tab->name=$request->name;
        $tab->image=$filename_ourproduct_3;
        $tab->details=$request->details;
        $tab->save();

        return redirect('ourproduct')->with('status','Added Successfully !');

    }

    public function ajax(Request $request)
    {
        $this->validate($request,[
                
                'category'=>'required',
                'sub_category'=>'required',
                'name'=>'required',
                'details'=>'required',
        ]);

        $tab=new OurProduct();
        
        $tab->category_name=$category_0_Category;
        $tab->category=$request->category;
        $tab->sub_category_name=$sub_category_1_SubCategory;
        $tab->sub_category=$request->sub_category;
        $tab->name=$request->name;
        $tab->image=$filename_ourproduct_3;
        $tab->details=$request->details;
        $tab->save();

        echo json_encode(array("status"=>"success","msg"=>"Added Successfully."));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OurProduct  $ourproduct
     * @return \Illuminate\Http\Response
     */

    private function methodToGetMembersCount($search=""){

        $tab=Customer::select('id','name','address','phone','email','last_invoice_no','created_at')
                     ->where('store_id',$this->sdc->storeID())->orderBy('id','DESC')
                     ->when($search, function ($query) use ($search) {
                        $query->where('id','LIKE','%'.$search.'%');
                            $query->orWhere('category','LIKE','%'.$search.'%');
                            $query->orWhere('sub_category','LIKE','%'.$search.'%');
                            $query->orWhere('name','LIKE','%'.$search.'%');
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
                            $query->orWhere('category','LIKE','%'.$search.'%');
                            $query->orWhere('sub_category','LIKE','%'.$search.'%');
                            $query->orWhere('name','LIKE','%'.$search.'%');
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

    
    public function OurProductQuery($request)
    {
        $OurProduct_data=OurProduct::orderBy('id','DESC')->get();

        return $OurProduct_data;
    }
    
   

    public function ExportExcel(Request $request) 
    {
         $dataDateTimeIns=formatDateTime(date('d-M-Y H:i:s a'));
        $data=array();
        $array_column=array(
                                'ID','Category','Sub Category','Name','Image','Details','Created Date');
        array_push($data, $array_column);
        $inv=$this->OurProductQuery($request);
        foreach($inv as $voi):
            $inv_arry=array(
                                $voi->id,$voi->category,$voi->sub_category,$voi->name,$voi->image,$voi->details,formatDate($voi->created_at));
            array_push($data, $inv_arry);
        endforeach;

        $excelArray=array(
            'report_name'=>'Our Product Report',
            'report_title'=>'Our Product Report',
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
                            <th class='text-center' style='font-size:12px;' >Category</th>
                        
                            <th class='text-center' style='font-size:12px;' >Sub Category</th>
                        
                            <th class='text-center' style='font-size:12px;' >Name</th>
                        
                            <th class='text-center' style='font-size:12px;' >Image</th>
                        
                            <th class='text-center' style='font-size:12px;' >Details</th>
                        
                <th class='text-center' style='font-size:12px;'>Created Date</th>
                </tr>
                </thead>
                <tbody>";

                    $inv=$this->OurProductQuery($request);
                    foreach($inv as $voi):
                        $html .="<tr>
                        <td style='font-size:12px;' class='text-center'>".$voi->id."</td>
                        <td style='font-size:12px;' class='text-center'>".$voi->category."</td>
                        <td style='font-size:12px;' class='text-center'>".$voi->sub_category."</td>
                        <td style='font-size:12px;' class='text-center'>".$voi->name."</td>
                        <td style='font-size:12px;' class='text-center'>".$voi->image."</td>
                        <td style='font-size:12px;' class='text-center'>".$voi->details."</td>
                        <td style='font-size:12px; text-align:center;' class='text-center'>".formatDate($voi->created_at)."</td>
                        </tr>";

                    endforeach;


                $html .="</tbody>
                
                </table>


                ";

                $this->sdc->PDFLayout('Our Product Report',$html);


    }
    public function show(OurProduct $ourproduct)
    {
        
        $tab=OurProduct::all();return view('admin.pages.ourproduct.ourproduct_list',['dataRow'=>$tab]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OurProduct  $ourproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(OurProduct $ourproduct,$id=0)
    {
        $tab=OurProduct::find($id); 
        $tab_Category=Category::all();
        $tab_SubCategory=SubCategory::all();     
        return view('admin.pages.ourproduct.ourproduct_edit',['dataRow_Category'=>$tab_Category,'dataRow_SubCategory'=>$tab_SubCategory,'dataRow'=>$tab,'edit'=>true]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OurProduct  $ourproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OurProduct $ourproduct,$id=0)
    {
        $this->validate($request,[
                
                'category'=>'required',
                'sub_category'=>'required',
                'name'=>'required',
                'details'=>'required',
        ]);

        $this->SystemAdminLog("Our Product","Update","Edit / Modify");

        
        $tab_0_Category=Category::where('id',$request->category)->first();
        $category_0_Category=$tab_0_Category->name;
        $tab_1_SubCategory=SubCategory::where('id',$request->sub_category)->first();
        $sub_category_1_SubCategory=$tab_1_SubCategory->name;

        $filename_ourproduct_3=$request->ex_image;
        if ($request->hasFile('image')) {
            $img_ourproduct = $request->file('image');
            $upload_ourproduct = 'upload/ourproduct';
            $filename_ourproduct_3 = env('APP_NAME').'_'.time() . '.' . $img_ourproduct->getClientOriginalExtension();
            $img_ourproduct->move($upload_ourproduct, $filename_ourproduct_3);
        }

                
        $tab=OurProduct::find($id);
        
        $tab->category_name=$category_0_Category;
        $tab->category=$request->category;
        $tab->sub_category_name=$sub_category_1_SubCategory;
        $tab->sub_category=$request->sub_category;
        $tab->name=$request->name;
        $tab->image=$filename_ourproduct_3;
        $tab->details=$request->details;
        $tab->save();

        return redirect('ourproduct')->with('status','Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OurProduct  $ourproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurProduct $ourproduct,$id=0)
    {
        $this->SystemAdminLog("Our Product","Destroy","Delete");

        $tab=OurProduct::find($id);
        $tab->delete();
        return redirect('ourproduct')->with('status','Deleted Successfully !');}
}
