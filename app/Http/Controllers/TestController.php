<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $product=new Product();
        $product->name='淚流滿麵';
        $product->price='100';
        $product->sprice=150;
        $product->picture='2342';
        $product->save();
    }
}
