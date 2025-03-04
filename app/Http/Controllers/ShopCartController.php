<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopCartController extends Controller
{
    public function shopCart(){
        return view('shopCart');
    }
}
