<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/**
 * Administrator Routes
 */
Auth::routes();

Route::post('/forgot-password/{type}', 'Admin\Auth\ForgotPasswordController@forgotPassword')->name('forgotPassword');
Route::get('/reset-password/{user}/{type}', 'Admin\Auth\ForgotPasswordController@resetPasswordView')->name('reset-password')->middleware('signed');
Route::post('/reset-password/{user}/{type}', 'Admin\Auth\ForgotPasswordController@resetPassword')->name('changePassword');
Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::group(['namespace' => 'Auth'], function () {
        Route::get('/', 'AuthController@index')->name('loginView');
        Route::post('/auth', 'AuthController@login')->name('authentication');
        Route::post('/signout', 'AuthController@logout')->name('signout');
    });

    Route::group(['middleware' => ['admin.auth']], function () {
        Route::resources([
            'dashboard' => 'Auth\DashboardController',
            'users' => 'Auth\UserController',
            'blogs' => 'Common\BlogController',
            'category' => 'Common\CategoryController',
            'products' => 'Common\ProductController',
            'our-speaker' => 'Common\OurSpeakerController',
            'orders' => 'Common\OrderController',
            'newsletter-subscribe' => 'Common\SubscribeController',
        ]);

        Route::group(['namespace' => 'Auth'], function () {
            Route::get('/profile', 'ProfileController@profileView')->name('profileView');
            Route::post('/profile', 'ProfileController@profile')->name('profileUpdate');
            Route::get('/change-password', 'ProfileController@changePasswordView')->name('changePasswordView');
            Route::post('/change-password', 'ProfileController@changePassword')->name('changePassword');
        });

        Route::group(['namespace' => 'Common'], function () {
            Route::get('/homepage-content', 'OtherController@homepageView')->name('homepageView');
            Route::post('/homepage-content', 'OtherController@homepage')->name('homepage');
            Route::get('/about-us', 'OtherController@aboutUsView')->name('aboutUsView');
            Route::post('/about-us', 'OtherController@aboutUs')->name('aboutUs');
            Route::get('/contact-us-content', 'OtherController@applicationView')->name('contactUsContent');
            Route::get('/faqs-content', 'OtherController@applicationView')->name('faqContent');
            Route::get('/terms-of-use-content', 'OtherController@applicationView')->name('termsOfUseContent');
            Route::get('/privacy-policy-content', 'OtherController@applicationView')->name('privacyPolicyContent');
            Route::get('/refund-policy-content', 'OtherController@applicationView')->name('refundPolicyContent');
            Route::get('/site-map-content', 'OtherController@applicationView')->name('siteMapContent');
            Route::post('/update-application-data', 'OtherController@updateApplicationData')->name('updateContent');
            Route::get('/delete/{type}/{id}', 'OtherController@delete')->name('deleteData');
        });
    });
});


/**
 * Website Routes
 */
Route::group(['prefix' => '/', 'namespace' => 'Website'], function () {
    Route::get('/', 'HomePageController@index')->name('homepage');
    Route::get('/category/{products}', 'ProductController@index')->name('productList');
    Route::get('/product/{category}/{product}', 'ProductController@productDetail')->name('productDetailPage');
    Route::get('/blogs', 'BlogController@index')->name('blogList');
    Route::get('/blog/{blog}', 'BlogController@blogDetail')->name('blogDetailPage');
    Route::get('/about-us', 'BlogController@aboutUs')->name('aboutUs');
    Route::get('/contact-us', 'HomePageController@contactUs')->name('contactUs');
    Route::post('/contact-us', 'HomePageController@contactUsForm')->name('contactUsForm');
    Route::get('/fags', 'HomePageController@faqs')->name('faqs');
    Route::get('/terms-of-use', 'HomePageController@termsOfUse')->name('termsOfUse');
    Route::get('/privacy-policy', 'HomePageController@privacyPolicy')->name('privacyPolicy');
    Route::get('/refund-policy', 'HomePageController@refundPolicy')->name('refundPolicy');
    Route::get('/site-map', 'HomePageController@siteMap')->name('siteMap');
    Route::post('/subscribe', 'HomePageController@subscribe')->name('subscribe');
    Route::get('/search', 'HomePageController@searchAll')->name('searchAll');
    //  Ajax Controller Routes
    Route::get('loaddata/{index}/{id?}', 'AjaxSelectController@loadData')->name('loadSingleData');
    Route::get('loadseldata/{index}/{selId}/{id?}', 'AjaxSelectController@loadSelData')->name('loadEditableData');

    Route::group(['namespace' => 'Auth'], function () {
        Route::get('/login', 'AuthController@loginView')->name('loginView');
        Route::post('/login', 'AuthController@login')->name('login');
        Route::get('/register', 'AuthController@registerView')->name('registerView');
        Route::post('/logout', 'AuthController@logout')->name('logout');
        Route::post('/update-profile', 'AccountController@updateProfile')->name('update-profile');
        Route::post('/change-password', 'AccountController@changePassword')->name('change-password');
    });

    Route::get('/cart', 'CartController@index')->name('cart');
    Route::post('/update-cart', 'CartController@updateCart')->name('updateCart');
    Route::post('/update-cart-product', 'CartController@updateCartProduct')->name('updateCartProduct');
    Route::get('/add-cart/{product}', 'CartController@addToCart')->name('addToCart');
    Route::get('/remove-cart/{product}', 'CartController@removeCart')->name('removeCart');

    Route::group(['middleware' => ['auth']], function () {
        Route::group(['namespace' => 'Auth'], function () {
            Route::get('my-account', 'AccountController@myAccount')->name('myAccount');
        });
        Route::get('checkout', 'CartController@checkOut')->name('checkOut');
        Route::put('payment-card-details', 'CartController@paymentCardView')->name('paymentCardView');
        Route::post('card-payment', 'CartController@cardPayment')->name('cardPayment');
        Route::get('order-confirmation', 'CartController@orderConfirmation')->name('orderConfirmation');
    });
});
