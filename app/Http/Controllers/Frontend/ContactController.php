<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;

use App\Model\Settings;

class ContactController extends FrontendController
{
    public function index()
    {
        return view('frontend.contacts',[
            'settings' => Settings::pluck('value', 'key')->all()
            ]);
    }
}
