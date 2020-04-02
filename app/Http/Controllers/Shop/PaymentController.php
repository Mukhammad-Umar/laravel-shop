<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application payment_page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function payment(){
        return view('shop.payment');
    }
}
