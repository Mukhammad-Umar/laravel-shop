<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ {
    Repositories\ShopRepository,
    Http\Requests\CartRequest,
    Models\Cart
};

class CheckOutController extends Controller{

    /**
     * The Controller instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
     protected $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ShopRepository $repository)
    {
        // $this->middleware('auth');
        $this->repository = $repository;
    }

    /**
     * Show the application checkout_page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function CheckOut(Request $request){
        $carts = $this->repository->fromCart();
        
        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("shop.cart-standard", compact('carts'))->render(),
            ]); 
        } 

        return view('shop.checkout', compact('carts'));
    } 
    
    /**
     * Show the application store tocart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tocart(CartRequest $request) 
    {
        $this->repository->store($request);   

        return redirect(route('checkout'));   // (url('/cart'))
    }

    /**
     * Remove all cart DB.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clearall(Request $request, Cart $model_cart) 
    {
        $model_cart->truncate();
        
        // Ajax response
        if ($request->ajax()) {
            return response()->json(); 
        } 

        return redirect(route('checkout'));   // (url('/cart'))
    }
    
    /**
     * RemoveOne from cart DB. 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function deleteone(Request $request, Cart $cart) 
     {
         $cart->find($request->id)->delete();
     }
}
