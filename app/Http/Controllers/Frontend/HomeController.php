<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;

use App\Model\Slider;

class HomeController extends FrontendController
{
    public function index()
    {
        return view('frontend.home',[
            'home'  => true,
            'slider'  => Slider::whereEnabled(1)->get(),
            ]);
    }
}
