<?php

namespace App\Http\Controllers\Website;

use App\Models\AboutUs;
use App\Models\OurSpeaker;
use App\Models\AboutUsPage;
use App\Models\Product;
use App\Models\CartProduct;
use App\Models\Blog;
use App\User;
use App\Utils\AppConstant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    protected $blog, $aboutUs;

    public function __construct(
        Blog $blog,
        AboutUs $aboutUs
    )
    {
        $this->blog = $blog;
        $this->aboutUs = $aboutUs;
    }

    public function index(Request $request)
    {
        $data['blogs'] = $this->blog
            ->where('status', AppConstant::STATUS_ACTIVE)
            ->get();

        return view('website.blogs.index', $data);
    }

    public function blogDetail(Request $request)
    {
        $data['blog'] = $this->blog
            ->where('url_name', 'LIKE', "%$request->blog%")
            ->where('status', AppConstant::STATUS_ACTIVE)
            ->first();
        return view('website.blogs.details', $data);
    }

    public function aboutUs(Request $request)
    {
        $data['aboutUs'] = AboutUsPage::where('status', AppConstant::STATUS_ACTIVE)
            ->orderBy('created_at', 'DESC')
            ->first();
        return view('website.about.index', $data);
    }


    // List All Spekers
     public function speakers()
    {
        $this->data['speakers'] = OurSpeaker::where('status',1)->orderBy('created_at','DESC')->get();
         
        return view('website.speakers.index',$this->data);
    }

    public function speakerDetail($id)
    {
        error_reporting(0);
        $this->data['speaker'] = OurSpeaker::where('title',$id)->first();
        $this->data['products'] = Product::where('speaker_name',$id)->where('status',1)->get();
         
        return view('website.speakers.details',$this->data);
    }


    // training
    public function training(Request $request)
    {
         \Session::put('product_type','product');
        $input= $request->all();
        //echo '<pre>';print_r($input);

        // Empty Packages Cart
        $user = \Auth::user();
        if($user){
            $carts = CartProduct::where('user_id', $user->id)->get();
           // echo '<pre>';print_r($carts);die;
            if($carts){
                 
                foreach ($carts as $cart) {
                    $cartsde = CartProduct::where('id',$cart['id'])->first();
                    $cartsde->delete();
                    \DB::commit();
                }
            }
        }else{
            $carts = \Cart::getContent();
            foreach ($carts as $cart) {
                \Cart::remove($cart['id']);
                 \DB::commit();
            }
        }

        // Empty Packages Cart

        if(!empty($input)){
            $this->data['products'] = Product::where("status", AppConstant::STATUS_ACTIVE);
            if(@$input['industry'] !=""){
            $this->data['products']=$this->data['products']->where('category_id', $input['industry'])->orderBy('webinar_date_time','asc');
            }
            if(@$input['type'] !=""){
            $this->data['products']=$this->data['products']->where('type', $input['type'])->orderBy('webinar_date_time','asc');
            }
            
            $this->data['products']=$this->data['products']->where('product_type',1)->orderBy('webinar_date_time','asc')->Paginate(6);
            return view('website.training.index',$this->data);

        }else{

        $this->data['products'] = Product::where('status',AppConstant::STATUS_ACTIVE)->where('product_type',1)->orderBy('webinar_date_time','asc')->Paginate(6);
        return view('website.training.index',$this->data);
        }
    }
    
    
    // Direct pay on mobile
    public function pay(){
        return view('website.pay.index');
    }
    public function payPost(Request $request){
        $input = $request->all();

        // $user= User::where('email',$input['email'])->first();
        // echo '<pre>';print_r($user);

        $user = User::where('email', '=', $input['email'])->first();
        //Now log in the user if exists
        if ($user != null)
        {
            \Auth::loginUsingId($user->id);
            \Session::put('direct_login','direct');
            \Session::flash('success', __('You have success fully login'));
            return redirect('/training');
        }else{
            \Session::flash('error', __('Please Enter Valid Email !!!'));
            return redirect()->back();
        }
    }
}
