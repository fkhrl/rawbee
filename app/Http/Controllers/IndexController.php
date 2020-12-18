<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\AboutUs;
use App\Category;
use App\Faq;
use App\OurProduct;
use App\OurService;
use App\SiteSetting;
use App\Slider;
use App\SubCategory;
use App\Client;
use App\ContactUs;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer;

class IndexController extends Controller
{
    private function categoryParseData()
    {
        $data=[];
        $pureCatCheck=category::count();

        if($pureCatCheck > 0 )
        {
            $pureCat=category::where('status','=','Active')->orderBy('id','ASC')->get();
            foreach($pureCat as $pc){
                $sCatCheck=SubCategory::where('category',$pc->id)->count();
                $subCatData=[];
                if($sCatCheck > 0)
                {
                    $sCat=SubCategory::where('category',$pc->id)->where('status','=','Active')->get();
                    foreach($sCat as $sc)
                    {
                        $subCatData[]=['id'=>$sc->id,'name'=>$sc->name];
                    }
                }
                $data[]=['id'=>$pc->id,'name'=>$pc->name,'scat'=>$subCatData];
            }
        }

        return $data;
    }

    public function home(){
        $SiteSetting = SiteSetting::first();
        $cat = $this->categoryParseData();
        $Slider = Slider::all();
        $AboutUs = AboutUs::first();
        $AboutUs->details = Str::limit($AboutUs->details, 1500);
        $OurService=OurService::all();
        $Faq=Faq::all();
        $Client=Client::all();

        // dd($SiteSetting);
        return view('site.pages.index',compact(
            'SiteSetting',
            'cat',
            'Slider',
            'AboutUs',
            'OurService',
            'Faq',
            'Client'
        ));
    }
    public function about(){
        $SiteSetting = SiteSetting::first();
        $cat = $this->categoryParseData();
        $AboutUs = AboutUs::first();
        return view('site.pages.about',compact(
            'SiteSetting',
            'cat',
            'AboutUs'
        ));
    }
    public function service(){
        $SiteSetting = SiteSetting::first();
        $cat = $this->categoryParseData();
        $OurService=OurService::all();
        return view('site.pages.service',compact(
            'SiteSetting',
            'cat',
            'OurService'
        ));
    }
    public function product($cid=0){
        $SiteSetting = SiteSetting::first();
        $cat = $this->categoryParseData();
        $SubCategory = SubCategory::where('category','=',$cid)->get();
        // dd($SubCategory);
        return view('site.pages.product',compact(
            'SiteSetting',
            'cat',
            'SubCategory'
        ));
    }
    public function productDetail($cid=0, $sid=0){
        $SiteSetting = SiteSetting::first();
        $cat = $this->categoryParseData();
        $OurProduct = OurProduct::where('category','=',$cid)->where('sub_category','=',$sid)->first();
        // dd($OurProduct);
        return view('site.pages.product-detail',compact(
            'SiteSetting',
            'cat',
            'OurProduct'
        ));
    }
    public function contact(){
        $SiteSetting = SiteSetting::first();
        $cat = $this->categoryParseData();
        return view('site.pages.contact',compact(
            'SiteSetting',
            'cat'));
    }

    protected static $host = "smtp.gmail.com";
    protected static $port = 587;
    protected static $encryption = 'tls';
    protected static $username = "fakhrul.server@gmail.com";
    protected static $password = "F@khrul@013";
    protected static $from = 'fakhrul.adds@gmail.com';
    protected static $fromName = 'fakhrul';

    public function send($from,$subject,$message,$name){
        $mail = new PHPMailer\PHPMailer(); 
        $mail->isSMTP();
        $mail->SMTPDebug = false;
        $mail->do_debug = 0;
        $mail->Host = self::$host;
        $mail->Port = self::$port;
        $mail->SMTPSecure = self::$encryption;
        $mail->SMTPAuth = true;
        $mail->Username = self::$username;
        $mail->Password = self::$password;
        $mail->setFrom($from, $name);
        $mail->addAddress('fakhrulislamtalukder@gmail.com', 'rewbee');
        $mail->ClearReplyTos();
        $mail->addReplyTo($from, $name);
        $mail->addBCC('fakhrul.server@gmail.com', 'rawbee');
        $mail->Subject = 'rewbee new request information - '.$subject;
        $mail->msgHTML($message);
        $mail->send();        
    }

    public function contactRequest(Request $request)
    {
        $this->validate($request,[
                
            'name'=>'required',
            'email'=>'required',
            'mobile_number'=>'required',
            'organization_name'=>'required',
        ]);

        // dd($request);
        $tab=new ContactUs();
        
        $tab->name=$request->name;
        $tab->email=$request->email;
        $tab->mobile_number=$request->mobile_number;
        $tab->organization_name=$request->organization_name;
        $tab->message=$request->message;
        $tab->save();
        
        set_time_limit(300); 
        
        
        $from = $request->email;
        $messages = $request->message;
        $subject = $request->organization_name;
        $name = $request->name;
        $message = '<html><body>';
            $message .= '<h2>rewbee Website</h2>';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $request->name . "</td></tr>";
            $message .= "<tr><td><strong>Email:</strong> </td><td>" . $from . "</td></tr>";

            $message .= "<tr><td><strong>Mobile Number:</strong> </td><td>" . $request->mobile_number . "</td></tr>";
        
            $message .= "<tr><td><strong>Organization Name:</strong> </td><td>" . $request->organization_name . "</td></tr>";
            $message .= "<tr><td><strong>Message:</strong> </td><td>" . $messages . "</td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";
        //
        //$this->send('fakhrul', '','test', 'test');
        // echo $name.'<br>';
        // echo $subject.'<br>';
        // echo $from.'<br>';
        //echo $message.'<br>';
        $dd = $this->send($from,$subject,$message,'rawbee');
        
            //dd($dd );
        return redirect()->back()->with('status','Successfully sent!');

    }
}
