<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ {
    Repositories\ShopRepository
};

class ShopController extends Controller{
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
        $this->repository = $repository;
    }

    /**
     * Show the application productS_page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function shop(Request $request){
        
        $products = $this->repository->funcSelect($request);

        if($request->ajax()){
            return response()->json([
                'table' => view("shop.brick-standard", compact('products'))->render(),
            ]); 
        }

        return view('shop.shop', ['products' => $products]);
    }
}
