<?php

namespace App\Http\Controllers\Website;

use App\Jobs\ContactUsJob;
use App\Jobs\NewsletterJob;
use App\Models\AboutUs;
use App\Models\ApplicationData;
use App\Models\Blog;
use App\Models\Category;
use App\Models\HomePageContent;
use App\Models\OurSpeaker;
use App\Models\Product;
use App\Models\Subscribe;
use App\Utils\AppConstant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class HomePageController extends Controller
{
    protected $homepage, $category, $product, $blog, $aboutUs, $ourSpeaker, $applicationData, $subscribe, $data;

    /**
     * HomePageController constructor.
     * @param HomePageContent $homePageContent
     * @param Category $category
     * @param Product $product
     * @param Blog $blog
     * @param AboutUs $aboutUs
     * @param OurSpeaker $ourSpeaker
     */
    public function __construct(
        HomePageContent $homePageContent,
        Category $category,
        Product $product,
        Blog $blog,
        AboutUs $aboutUs,
        OurSpeaker $ourSpeaker,
        ApplicationData $applicationData,
        Subscribe $subscribe
    )
    {
        $this->homepage = $homePageContent;
        $this->category = $category;
        $this->product = $product;
        $this->blog = $blog;
        $this->aboutUs = $aboutUs;
        $this->ourSpeaker = $ourSpeaker;
        $this->applicationData = $applicationData;
        $this->subscribe = $subscribe;
        $this->data = [];
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
    
        $this->data['homepage'] = $this->homepage
            ->where('status', AppConstant::STATUS_ACTIVE)
            ->first();
        $this->data['categories'] = $this->category
            ->where('status', AppConstant::STATUS_ACTIVE)
            ->get();
        $this->data['products'] = $this->product
            ->where('webinar_date_time', '>=', Carbon::now())
            ->where('status', AppConstant::STATUS_ACTIVE)
            ->orderBy('created_at', 'DESC')
            ->get();
        $this->data['blogs'] = $this->blog
            ->where('status', AppConstant::STATUS_ACTIVE)
            ->limit(3)
            ->get();
        $this->data['speakers'] = $this->ourSpeaker
            ->where('status', AppConstant::STATUS_ACTIVE)
            ->limit(5)
            ->get();
        $this->data['aboutUs'] = $this->aboutUs
            ->where('status', AppConstant::STATUS_ACTIVE)
            ->orderBy('created_at', 'DESC')
            ->first();
        return view('website.homepage.index', $this->data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contactUs()
    {
        $this->data['contactus'] = $this->applicationData->where('type', 1)->first();
        return view('website.contact-us.index', $this->data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function faqs()
    {
        $this->data['faq'] = $this->applicationData->where('type', 2)->first();
        return view('website.faq.index', $this->data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function termsOfUse()
    {
        $this->data['termsofuse'] = $this->applicationData->where('type', 3)->first();
        return view('website.terms-of-use.index', $this->data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function privacyPolicy()
    {
        $this->data['privacypolicy'] = $this->applicationData->where('type', 4)->first();
        return view('website.privacy-policy.index', $this->data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function refundPolicy()
    {
        $this->data['refundpolicy'] = $this->applicationData->where('type', 5)->first();
        return view('website.refund-policy.index', $this->data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function siteMap()
    {
        $this->data['sitemap'] = $this->applicationData->where('type', 6)->first();
        return view('website.site-map.index', $this->data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscribe(Request $request)
    {
        try {
            DB::beginTransaction();

            $subscribe = $this->subscribe;
            $subscribe->email = $request->subscribe_email;
            $subscribe->save();

            $data['email'] = $request->subscribe_email;
            NewsletterJob::dispatch($data)->onQueue(AppConstant::SUBSCRIBE);

            Session::flash('success', __('message.subscribe_success'));
            DB::commit();
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            Session::flash('error', __('auth.server_error'));
            DB::rollBack();
        }
        return redirect()->back();
    }

    /**
     * @param Request $request
     */
    public function contactUsForm(Request $request)
    {
        try {
            $data['request'] = $request->all();
            ContactUsJob::dispatch($data)->onQueue(AppConstant::CONTACT_US);

            Session::flash('success', __('message.contact_us_success'));
            return redirect()->back();
        } catch (\Exception $exception) {
            Session::flash('error', __('auth.server_error'));
            return redirect()->back()->withInput();
        }
    }

    public function searchAll(Request $request)
    {
        $products = $this->product->with('category')
            ->where('title', 'LIKE', "%$request->keyword%")
            ->where('status', AppConstant::STATUS_ACTIVE)
            ->get()->toArray();

        $blogs = $this->blog
            ->where('title', 'LIKE', "%$request->keyword%")
            ->where('status', AppConstant::STATUS_ACTIVE)
            ->get()->toArray();

        $this->data['searches'] = array_merge($products, $blogs);
        array_multisort($this->data['searches']);

        return view('website.search.index', $this->data);
    }
}
