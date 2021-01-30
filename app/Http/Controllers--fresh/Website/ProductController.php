<?php

namespace App\Http\Controllers\Website;

use App\Models\Category;
use App\Models\Product;
use App\Utils\AppConstant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    protected $product, $category;

    /**
     * ProductController constructor.
     * @param Category $category
     * @param Product $product
     */
    public function __construct(
        Category $category,
        Product $product
    )
    {
        $this->category = $category;
        $this->product = $product;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $category = $request->products;
        $data['category'] = $this->category
            ->where("url_name", "LIKE", "%$category%")
            ->where("status", AppConstant::STATUS_ACTIVE)
            ->first();
        if (!$data['category']) {
            return redirect('/');
        }
        $data['products'] = $this->product
            ->where("status", AppConstant::STATUS_ACTIVE)
            ->where('category_id', $data['category']->id)
            ->get();
        return view('website.product.index', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function productDetail(Request $request)
    {
        $data['product'] = $this->product
            ->with('category')
            ->where('url_name', 'LIKE', "%$request->product")
            ->where("status", AppConstant::STATUS_ACTIVE)
            ->first();

        return view('website.product.details', $data);
    }
}
