<?php

namespace App\Http\Controllers\Admin\Common;

use App\Models\Category;
use App\Models\Product;
use App\Models\Program;
use App\Models\Coupon;
use App\Models\CouponDetail;
use App\traits\UrlGenerator;
use App\Utils\AppConstant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $product, $category, $data;

    use UrlGenerator;

    public function __construct(
        Product $product,
        Category $category
    )
    {
        $this->product = $product;
        $this->category = $category;
        $this->data = [];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products'] = $this->product->where('product_type',1)->orderBy('created_at','DESC')->get();
        return view('admin.products.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         
        $this->data['categories'] = $this->category->where('status', AppConstant::STATUS_ACTIVE)->get();
        return view('admin.products.store', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
         
        try {
            DB::beginTransaction();

            $speakerImage = null;
            $productImage = null;

            if ($request->hasFile('speaker_image')) {
                $path = base_path() . 'storage/app/public/products/speaker/';
                $image = $request->file('speaker_image');
                $name = 'speaker_' . mt_rand(111111, 999999);
                if (!file_exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $speakerImage = $image->storeAs(
                    'products/speaker/', $name . "." . $image->getClientOriginalExtension(), 'public'
                );
            }
            if ($request->hasFile('product_image')) {
                $path = base_path() . 'storage/app/public/products/';
                $image = $request->file('product_image');
                $name = 'products_' . mt_rand(111111, 999999);
                if (!file_exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $productImage = $image->storeAs(
                    'products/', $name . "." . $image->getClientOriginalExtension(), 'public'
                );
            }

            $product = $this->product;
            $product->category_id = $request->category;
            $product->type = $request->type;
            $product->url_name = $this->generate($request->title);
            $product->title = $request->title;
            $product->speaker_name = $request->speaker_name;
            $product->speaker_picture = $speakerImage;
            $product->picture = $productImage;
            $product->price = $request->price;
            $product->webinar_date_time = Carbon::parse($request->webinar_date)->format('Y-m-d') . " " . $request->webinar_time . ':00';;
            $product->duration = $request->duration;
            $product->overview = $request->overview;
            $product->speaker = $request->speaker;
            $product->ceus = $request->ceus;
            $product->save();

            
            // Insert data in to program table
            foreach ($request->all()['p_name'] as $key => $value) {
                 
                $program=  new Program();
                $program->product_id=$product->id;
                $program->program_name=$value['name'];
                $program->price=$value['price'];
                $program->visible=$value['show1'];
                $program->type=$value['type'];
                $program->save();
            }

            

            

            DB::commit();
            Session::flash('success', __('message.create_product'));
            return redirect()->route('products.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', __('auth.server_error'));
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['categories'] = $this->category->where('status', AppConstant::STATUS_ACTIVE)->get();

        $this->data['product'] = $this->product->where('id', $id)->first();
        $this->data['program'] = Program::where('product_id',$id)->get();
        //echo '<pre>';print_r($this->data);die;
        return view('admin.products.update', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        try {
            DB::beginTransaction();

            $product = $this->product->find($id);
            $product->category_id = $request->category;
            $product->type = $request->type;
            $product->title = $request->title;
            $product->speaker_name = $request->speaker_name;
            if ($request->hasFile('speaker_image')) {
                $path = base_path() . 'storage/app/public/products/speaker/';
                $image = $request->file('speaker_image');
                $name = 'speaker_' . mt_rand(111111, 999999);
                if (!file_exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $speakerImage = $image->storeAs(
                    'products/speaker/', $name . "." . $image->getClientOriginalExtension(), 'public'
                );
                $product->speaker_picture = $speakerImage;
            }
            if ($request->hasFile('product_image')) {
                $path = base_path() . 'storage/app/public/products/';
                $image = $request->file('product_image');
                $name = 'products_' . mt_rand(111111, 999999);
                if (!file_exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $productImage = $image->storeAs(
                    'products/', $name . "." . $image->getClientOriginalExtension(), 'public'
                );
                $product->picture = $productImage;
            }

            $product->price = $request->price;
            $product->webinar_date_time = Carbon::parse($request->webinar_date)->format('Y-m-d') . " " . $request->webinar_time . ':00';
            $product->duration = $request->duration;
            $product->overview = $request->overview;
            $product->speaker = $request->speaker;
            $product->ceus = $request->ceus;
 
            $product->save();

            // update data in to program table
            $programCheck=  Program::where('product_id',$id)->count();
            if($programCheck > 0){
            foreach ($request->all()['p_name'] as $key => $value) {
                
                $program=  Program::where('product_id',$id)->where('id',$value['pId'])->first();
                $program->product_id=$id;
                $program->program_name=$value['name'];
                $program->price=$value['price'];
                $program->visible=$value['show1'];
                $program->update();
            }
            }else{
                foreach ($request->all()['p_name'] as $key => $value) {
                 
                    $program=  new Program();
                    $program->product_id=$id;
                    $program->program_name=$value['name'];
                    $program->price=$value['price'];
                    $program->visible=$value['show1'];
                    $program->save();
                }
            }
            


            DB::commit();
            Session::flash('success', __('message.update_product'));
            return redirect()->route('products.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', __('auth.server_error'));
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function listCoupon(){
            $coupons= Coupon::orderBY('id','desc')->get();
            return view('admin.coupon.index')->with('coupons',$coupons);
        } 


         public function addCoupon(Request $request){

            $data= $request->all();

            if(!empty($data)){
                 //echo '<pre>';print_r($data);die;
                 $coupon= Coupon::where('coupon_code',$data['coupon_code'])->first();
                 if($coupon){
                    \Session::flash('error', 'Coupon Code already Exists!');
                    return view('admin.coupon.add-coupon');
                 }else{

                    if($data['from'] !="" && $data['to'] !=""){
                        $start= date('Y-m-d',strtotime($data['from']));
                        $end= date('Y-m-d',strtotime($data['to']));
                    }else{
                        $start="";
                        $end="";
                    }



                    $cpn= new Coupon();
                    $cpn->coupon_code=$data['coupon_code']; 
                    $cpn->start_date=$start; 
                    $cpn->end_date=$end; 
                    $cpn->uses=$data['uses']; 
                    $cpn->cupon_type='fixed'; 
                        if($data['from'] =="" && $data['to']=="" || $data['uses'] ==""){
                    $cpn->status=1;
                }

                    
                $cpn->price=$data['famount'];
                    
                     

                    $cpn->save();
                    \Session::flash('success', 'You heve Successfully Add Coupon!');
                    return redirect('/admin/coupons');
                 }
                


            }else{
                return view('admin.coupon.add-coupon');
            }
            
        }


        // delete coupn

        public function deleteCoupon($id){
             
            $delete = Coupon::where('id',$id)->first();
            $delete->delete();

            \Session::flash('success', 'You have successfully Deleted!');

            return redirect('admin/coupons');
        }

        // edit coupon
        public function couponEdit($id){
            $edit = Coupon::where('id',$id)->first();
            return view('admin.coupon.edit-coupon')->with('edit',$edit);
        }
        // Update coupon

        public function updateCoupon(Request $request,$id){
                     
            $data= $request->all();
            
            //echo $id;die;
            //echo '<pre>';print_r($data);die;
            if($data['from'] !="" && $data['to'] !=""){
                $start= date('Y-m-d',strtotime($data['from']));
                $end= date('Y-m-d',strtotime($data['to']));
            }else{
                $start="";
                $end="";
            }



            $cpn= Coupon::where('id',$id)->first();
            $cpn->coupon_code=$data['coupon_code']; 
            $cpn->start_date=$start; 
            $cpn->end_date=$end; 
            $cpn->uses=$data['uses']; 
            $cpn->cupon_type='fixed'; 
            if($data['from'] =="" && $data['to']=="" || $data['uses'] ==""){
                $cpn->status=1;
            }
            if(isset($data['uses']) && $data['uses'] !=""){
                $cpn->status=0;
            }

            
             
               $cpn->price=$data['famount']; 
            

             

            $cpn->update();
            \Session::flash('success', 'You heve Successfully Update Coupon!');
            return redirect('/admin/coupons');

         

        }
        
        // list Package
        public function package(Request $request){
             
            $this->data['products'] = $this->product->where('product_type',0)->orderBy('created_at','DESC')->get();
            return view('admin.package.index',$this->data);
        }

        public function addPackage(Request $request){
            error_reporting(0);
            $input= $request->all();

            if($input){
               
            if($request->price){
                $p= $request->price;
            }else{
                $p= 0;
            }

            $product = $this->product;
            $product->category_id = 0;
            $product->type = 0;
            $product->product_type = 0;
            $product->url_name = $this->generate($request->title);
            $product->title = $request->title;
            $product->speaker_name = '';
            $product->speaker_picture = '';
            $product->picture = '';
            $product->price = $p;
            $product->package_credit=$request->package_credit;
            $product->webinar_date_time = now();
            $product->duration = '';
            $product->overview = $request->overview;
            $product->speaker ='';
            $product->ceus = '';
            $product->save();

            
           

            

            DB::commit();
            Session::flash('success', __('You have successfully create package!'));
            return redirect('/admin/package');
         
            }


            return view('admin.package.store');
        }


        // Delete Package
        
        public function deletePackage($id){
             
            $changeStatus= Product::where('id',$id)->first();
            $changeStatus->status= $changeStatus->status==1 ? 0 : 1;
            $changeStatus->update();

            DB::commit();
            Session::flash('success', __('You have successfully Changed Status!'));
            return redirect('/admin/package');

        }

        // edit package
        public function editPackage($id){
           error_reporting(0);  
           $this->data['product'] = $this->product->where('id', $id)->first();
            return view('admin.package.update',$this->data);

        }
        // updatePackage package
        public function updatePackage(Request $request,$id){
            
            
            
            $input= $request->all();
            
            if($request->price){
                $p= $request->price;
            }else{
                $p= 0;
            }
            $prod= Product::where('id',$id)->first();
            $prod->title=$input['title'];
            $prod->price=$p;
            $prod->package_credit=$input['package_credit'];
            $prod->overview=$input['overview'];
            $prod->update();

            DB::commit();
            Session::flash('success', __('You have successfully Updated'));
            return redirect('/admin/package');


        }
        
        // Edit coupon

        public function info($id){
            $this->data['coupons']= CouponDetail::where('cpn_id',$id)->orderBY('id','desc')->get();
            return view('admin.coupon.info',$this->data);
        }

}
