<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('homepage');
    }
    public function market(){
        return view('pages.market.index');
    }
    public function about(){
        return view('pages.about.index');
    }
    public function partner(){
        return view('pages.partner.index');
    }
}
