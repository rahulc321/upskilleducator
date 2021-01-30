<?php
/**
 * Created by PhpStorm.
 * User: Bhargav
 * Date: 11/9/2018
 * Time: 3:55 PM
 */

namespace App\Http\ViewComposers;


use App\Models\CartProduct;
use App\Models\Category;
use App\Utils\AppConstant;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MenuComposer
{
    /**
     * The user repository implementation.
     *
     * @var Category
     */
    protected $category;

    /**
     * Create a new profile composer.
     *
     * @param Category $category
     * @return void
     */
    public function __construct(
        Category $category,
        CartProduct $cartProduct
    )
    {
        $this->category = $category;
        $this->cart = $cartProduct;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menus', $this->category->where('status', AppConstant::STATUS_ACTIVE)->get());
        if (Auth::user()) {
            $cart = $this->cart->where('user_id', Auth::user()->id)->get();
        } else {
            $cart = \Cart::getContent();
        }
        $view->with('cart', $cart);
    }
}
