<?php

namespace App\Http\Controllers\Website;

use App\Models\AboutUs;
use App\Models\Blog;
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
        $data['aboutUs'] = $this->aboutUs
            ->where('status', AppConstant::STATUS_ACTIVE)
            ->orderBy('created_at', 'DESC')
            ->first();
        return view('website.about.index', $data);
    }
}
