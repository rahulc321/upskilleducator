<?php

namespace App\Http\Controllers\Admin\Common;

use App\Models\AboutUs;
use App\Models\AboutUsPage;
use App\Models\ApplicationData;
use App\Models\Blog;
use App\Models\Category;
use App\Models\HomePageContent;
use App\Models\OurSpeaker;
use App\Models\Product;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class OtherController extends Controller
{
    protected $aboutus, $homepage, $applicationData, $data, $users, $blogs, $products, $category, $speakers;

    /**
     * OtherController constructor.
     * @param AboutUs $aboutUs
     * @param HomePageContent $homePageContent
     * @param ApplicationData $applicationData
     */
    public function __construct(
        AboutUs $aboutUs,
        HomePageContent $homePageContent,
        ApplicationData $applicationData,
        Users $users,
        Blog $blog,
        Product $product,
        Category $category,
        OurSpeaker $speakers
    )
    {
        $this->aboutus = $aboutUs;
        $this->homepage = $homePageContent;
        $this->applicationData = $applicationData;
        $this->users = $users;
        $this->blogs = $blog;
        $this->products = $product;
        $this->category = $category;
        $this->speakers = $speakers;
        $this->data = [];
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function homepageView()
    {
        $this->data['homepage'] = $this->homepage->first();
        return view('admin.other.homepage', $this->data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function homepage(Request $request)
    {
        try {
            DB::beginTransaction();

            $homepage = $this->homepage->find($request->id);
            if ($request->hasFile('homepage_banner')) {
                $path = base_path() . 'storage/app/public/homepage/';
                $image = $request->file('homepage_banner');
                $name = 'homepage_banner_' . mt_rand(111111, 999999);
                if (!file_exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $homepage_banner = $image->storeAs(
                    'homepage/', $name . "." . $image->getClientOriginalExtension(), 'public'
                );
                $homepage->homepage_banner = $homepage_banner;
            }
            if ($request->hasFile('homepage_content_1_img')) {
                $path = base_path() . 'storage/app/public/homepage/';
                $image = $request->file('homepage_content_1_img');
                $name = 'homepage_content_1_' . mt_rand(111111, 999999);
                if (!file_exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $homepage_text1_picture = $image->storeAs(
                    'homepage/', $name . "." . $image->getClientOriginalExtension(), 'public'
                );
                $homepage->homepage_text1_picture = $homepage_text1_picture;
            }
            if ($request->hasFile('homepage_content_2_img')) {
                $path = base_path() . 'storage/app/public/homepage/';
                $image = $request->file('homepage_content_2_img');
                $name = 'homepage_content_2_' . mt_rand(111111, 999999);
                if (!file_exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $homepage_text2_picture = $image->storeAs(
                    'homepage/', $name . "." . $image->getClientOriginalExtension(), 'public'
                );
                $homepage->homepage_text1_picture = $homepage_text2_picture;
            }
            if ($request->hasFile('homepage_content_3_img')) {
                $path = base_path() . 'storage/app/public/homepage/';
                $image = $request->file('homepage_content_3_img');
                $name = 'homepage_content_3_' . mt_rand(111111, 999999);
                if (!file_exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $homepage_text3_picture = $image->storeAs(
                    'homepage/', $name . "." . $image->getClientOriginalExtension(), 'public'
                );
                $homepage->homepage_text3_picture = $homepage_text3_picture;
            }
            $homepage->homepage_text1 = $request->homepage_content_1;
            $homepage->homepage_text2 = $request->homepage_content_2;
            $homepage->homepage_text3 = $request->homepage_content_3;
            $homepage->homepage_secondary_text1 = $request->homepage_secondary_content_1;
            $homepage->homepage_secondary_text2 = $request->homepage_secondary_content_2;
            $homepage->homepage_secondary_text3 = $request->homepage_secondary_content_3;
            $homepage->save();

            DB::commit();
            Session::flash('success', __('message.homepage_content_update'));
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', __('auth.server_error'));
            return redirect()->back()->withInput();
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function aboutUsView()
    {
        $this->data['aboutus'] = $this->aboutus->first();
        return view('admin.other.aboutus', $this->data);
    }
    
    // About us page route
    public function aboutUsPageView()
    {
        $this->data['aboutus'] = AboutUsPage::first();
        return view('admin.other.aboutuspage', $this->data);
    }
 
    // update about us page
    public function aboutUsUpdate(Request $request)
    {
        try {
            DB::beginTransaction();

            $aboutus = AboutUsPage::find($request->id);
            if ($request->hasFile('profile_pic')) {
                $path = base_path() . 'storage/app/public/about/';
                $image = $request->file('profile_pic');
                $name = 'about_us_' . mt_rand(111111, 999999);
                if (!file_exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $profile_pic = $image->storeAs(
                    'about/', $name . "." . $image->getClientOriginalExtension(), 'public'
                );
                $aboutus->image = $profile_pic;
            }
            $aboutus->title = $request->title;
            $aboutus->description = $request->description;
            $aboutus->save();

            DB::commit();
            Session::flash('success', __('message.aboutus_content_update'));
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', __('auth.server_error'));
            return redirect()->back()->withInput();
        }

    }
    
    

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function aboutUs(Request $request)
    {
        try {
            DB::beginTransaction();

            $aboutus = $this->aboutus->find($request->id);
            if ($request->hasFile('profile_pic')) {
                $path = base_path() . 'storage/app/public/about/';
                $image = $request->file('profile_pic');
                $name = 'about_us_' . mt_rand(111111, 999999);
                if (!file_exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $profile_pic = $image->storeAs(
                    'about/', $name . "." . $image->getClientOriginalExtension(), 'public'
                );
                $aboutus->image = $profile_pic;
            }
            $aboutus->title = $request->title;
            $aboutus->description = $request->description;
            $aboutus->save();

            DB::commit();
            Session::flash('success', __('message.aboutus_content_update'));
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', __('auth.server_error'));
            return redirect()->back()->withInput();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function applicationView(Request $request)
    {
        switch ($request->route()->getName()) {
            case 'contactUsContent':
                $this->data['app_data'] = $this->applicationData->where('type', 1)->first();
                $this->data['type'] = 1;
                break;
            case 'faqContent';
                $this->data['app_data'] = $this->applicationData->where('type', 2)->first();
                $this->data['type'] = 2;
                break;
            case 'termsOfUseContent';
                $this->data['app_data'] = $this->applicationData->where('type', 3)->first();
                $this->data['type'] = 3;
                break;
            case 'privacyPolicyContent';
                $this->data['app_data'] = $this->applicationData->where('type', 4)->first();
                $this->data['type'] = 4;
                break;
            case 'refundPolicyContent';
                $this->data['app_data'] = $this->applicationData->where('type', 5)->first();
                $this->data['type'] = 5;
                break;
            case 'siteMapContent';
                $this->data['app_data'] = $this->applicationData->where('type', 6)->first();
                $this->data['type'] = 6;
                break;
            default:
                Session::flash('error', __('auth.server_error'));
                return redirect('/');
        }
        return view('admin.application.index', $this->data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateApplicationData(Request $request)
    {
        try {
            $this->data['app_data'] = $this->applicationData->where('type', $request->type)->update([
                'description' => $request->description
            ]);
            Session::flash('success', __('message.data_update'));
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', __('auth.server_error'));
            return redirect()->back();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();

            switch ($request->type) {
                case 'users':
                    $status = $this->users->find($request->id);
                    if ($status->status == 1) {
                        $data = array(
                            "status" => 0
                        );
                        $message = __('message.inactivate_data', ['data' => 'User']);
                    } else {
                        $data = array(
                            "status" => 1
                        );
                        $message = __('message.activate_data', ['data' => 'User']);
                    }
                    $this->users->where('id', $request->id)->update($data);
                    break;
                case 'blogs':
                    $status = $this->blogs->find($request->id);
                    if ($status->status == 1) {
                        $data = array(
                            "status" => 0
                        );
                        $message = __('message.inactivate_data', ['data' => 'Blog']);
                    } else {
                        $data = array(
                            "status" => 1
                        );
                        $message = __('message.activate_data', ['data' => 'Blog']);
                    }
                    $this->blogs->where('id', $request->id)->update($data);
                    break;
                case 'products':
                    $status = $this->products->find($request->id);
                    if ($status->status == 1) {
                        $data = array(
                            "status" => 0
                        );
                        $message = __('message.inactivate_data', ['data' => 'Product']);
                    } else {
                        $data = array(
                            "status" => 1
                        );
                        $message = __('message.activate_data', ['data' => 'Product']);
                    }
                    $this->products->where('id', $request->id)->update($data);
                    break;
                case 'category':
                    $status = $this->category->find($request->id);
                    if ($status->status == 1) {
                        $data = array(
                            "status" => 0
                        );
                        $message = __('message.inactivate_data', ['data' => 'Category']);
                    } else {
                        $data = array(
                            "status" => 1
                        );
                        $message = __('message.activate_data', ['data' => 'Category']);
                    }
                    $this->category->where('id', $request->id)->update($data);
                    break;
                case 'speakers':
                    $status = $this->speakers->find($request->id);
                    if ($status->status == 1) {
                        $data = array(
                            "status" => 0
                        );
                        $message = __('message.inactivate_data', ['data' => 'Our Speaker']);
                    } else {
                        $data = array(
                            "status" => 1
                        );
                        $message = __('message.activate_data', ['data' => 'Our Speaker']);
                    }
                    $this->speakers->where('id', $request->id)->update($data);
                    break;
            }
            DB::commit();
            Session::flash('success', $message);
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', __('auth.server_error'));
            return redirect()->back();
        }
    }
}
