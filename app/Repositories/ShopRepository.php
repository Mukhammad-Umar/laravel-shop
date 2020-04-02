<?php

namespace App\Repositories;

use App\Models\ {
    Product,
    Cart,
    Subscribe
};
use Illuminate\Support\Facades\DB;

class ShopRepository 
{
    /**
     * The product_model instance.
     *
     * @var \Illuminate\Database\Eloquent\product_model
     * @var \Illuminate\Database\Eloquent\cart_model
     */
    protected $product_model;
    protected $cart_model;


    /**
     * Create a new ShopRepository instance.
     *
     * @param  \App\product_models\Product $product
     */
    public function __construct(Product $product, Cart $cart)
    {
        $this->product_model = $product;
        $this->cart_model = $cart;
    }

    /**
     * Create a query for Product.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function funcSelect($request)
    {
        $query = $this->product_model
            ->select('id', 'name', 'price', 'image')
            ->where('top9', 1)
            ->orderBy('price', 'desc');
            if(isset($request->search)){
                $query->where('name', 'like', '%' . $request->search . '%');
            }
        return $query->get();
    }  
    
    /**
     * Create a query for Product <- not using.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function funcSelectOne($id){
        $query = $this->product_model
            ->select('id', 'name', 'price', 'image')
            ->where('id', $id);
        return $query->get();
    }
    
    /**
     * Show the application store_tocart.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
     public function store($request)
     {
        Cart::create($request->all());
     }
     
    /**
     * Getting products from Cart DB.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function fromCart(){
        $query = $this->cart_model
            ->select('id', 'name', 'price', 'image');
        return $query->get();
    }
    
    /**
     * RemoveOne from cart DB <- not using.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function clearOne($request) 
     {
        $cart = $this->cart_model->find($request->id);
        $cart->delete();
     }
     
    /**
     * Mailer of sending message.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */   
     public function mailer($request){
        Subscribe::create($request->all());

        $title = 'Message from WebSite - ' . date('d-m-Y H:i:s');
        $message = 'You have been successfully registered! ';
        $client = new \GuzzleHttp\Client([
            'headers' => [
                //'Authorization' => '9267585bb333341dc049321d4e74398f',
                //'Content-Type' => 'application/json',
             ]
         ]);
         $response = $client->request('GET', 'http://api.25one.com.ua/api_mail.php?email_to=' . $request->email . '&title=' . $title . '&message=' . $message,
          [
             //...
          ]);    
         //return json_decode($response->getBody()->getContents());  
         return response()->json([
                 'answer' => $response->getBody()->getContents(),
             ]);
     }   

}
