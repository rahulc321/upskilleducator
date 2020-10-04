<?php

namespace App\Http\Controllers\Admin\Common;

use App\Models\Category;
use App\Models\Product;
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
        $this->data['products'] = $this->product->orderBy('created_at','DESC')->get();
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
}
