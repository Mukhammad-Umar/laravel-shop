<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ {
    Repositories\ShopRepository,
    Http\Requests\SubscribeRequest
}; 

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application home_page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('shop.index');
    }

    /**
     * Mailer of sending message.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
     public function mailer(SubscribeRequest $request, ShopRepository $repository) 
     {
        if(isset($request->validator) && $request->validator->fails()) //if you need validator->errors() in Controller
        {
            return json_encode($request->validator->errors());
        }
   
        return $repository->mailer($request);

     }            
 
}
