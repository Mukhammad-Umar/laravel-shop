<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ {
    Repositories\ShopRepository,
    Models\Product
};

class ProductController extends Controller{
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
     * Show the application one_product_page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product($id, Product $product_model)
    {
        // $product = $this->repository->funcSelectOne($id);
        $product = $product_model->find($id); 

        return view('shop.product', compact('product')); 
    }
}
