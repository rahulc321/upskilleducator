<?php

namespace App\Http\Controllers\Admin\Common;

use App\Models\Blog;
use App\traits\UrlGenerator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    protected $blogs, $data;

    use UrlGenerator;

    public function __construct(Blog $blogs)
    {
        $this->blogs = $blogs;
        $this->data = [];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['blogs'] = $this->blogs->orderBy('created_at', 'DESC')->get();
        return view('admin.blogs.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.store');
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

            $homepath = null;

            if ($request->hasFile('profile_pic')) {
                $path = base_path() . 'storage/app/public/blogs/';
                $image = $request->file('profile_pic');
                $name = 'blogs_' . mt_rand(111111, 999999);
                if (!file_exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $homepath = $image->storeAs(
                    'blogs/', $name . "." . $image->getClientOriginalExtension(), 'public'
                );
            }

            $blog = $this->blogs;
            $blog->url_name = $this->generate($request->title);
            $blog->title = $request->title;
            $blog->image = $homepath;
            $blog->description = $request->description;
            $blog->save();

            DB::commit();
            Session::flash('success', __('message.create_blog'));
            return redirect()->route('blogs.index');
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
        $this->data['blog'] = $this->blogs->where('id', $id)->first();
        return view('admin.blogs.update', $this->data);
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

            $blog = $this->blogs->find($id);
            $blog->url_name = $this->generate($request->title);
            $blog->title = $request->title;
            if ($request->hasFile('profile_pic')) {
                $path = base_path() . 'storage/app/public/blogs/';
                $image = $request->file('profile_pic');
                $name = 'blogs_' . mt_rand(111111, 999999);
                if (!file_exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $homepath = $image->storeAs(
                    'blogs/', $name . "." . $image->getClientOriginalExtension(), 'public'
                );
                $blog->image = $homepath;
            }
            $blog->description = $request->description;
            $blog->save();

            DB::commit();
            Session::flash('success', __('message.update_blog'));
            return redirect()->route('blogs.index');
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
