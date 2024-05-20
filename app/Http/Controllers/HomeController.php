<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    //    return view('fruitkha.index_2');

        return view('bizNews.index');
    }
}
