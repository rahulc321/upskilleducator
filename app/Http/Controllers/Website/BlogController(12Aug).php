<?php

namespace App\Http\Controllers\Website;

use App\Models\AboutUs;
use App\Models\AboutUsPage;
use App\Models\Blog;
use App\Models\OurSpeaker;
use App\Models\Product;
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
    
    // training Page
    
    public function training(Request $request)
    {
        \Session::put('product_type','product');
        $input= $request->all();
        //echo '<pre>';print_r($input);

        if(!empty($input)){
            $this->data['products'] = Product::where("status", AppConstant::STATUS_ACTIVE);
            if(@$input['industry'] !=""){
            $this->data['products']=$this->data['products']->where('category_id', $input['industry']);
            }
            if(@$input['type'] !=""){
            $this->data['products']=$this->data['products']->where('type', $input['type']);
            }
            $this->data['products']=$this->data['products']->where('product_type',1)->Paginate(6);
            return view('website.training.index',$this->data);

        }else{

        $this->data['products'] = Product::where('status',AppConstant::STATUS_ACTIVE)->where('product_type',1)->Paginate(6);
        return view('website.training.index',$this->data);
        }
    }
    
    
}
