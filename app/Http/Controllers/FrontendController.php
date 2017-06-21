<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Settings;
use App\Model\Category;
use App\Model\Partner;
use App\Model\Property;

use Mail;

class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Set global var for a views
        view()->share('settings', Settings::pluck('value', 'key')->all());
        view()->share('categories', Category::pluck('title', 'slug')->all());
        view()->share('partners', Partner::whereEnabled(1)->get());
        view()->share('properties', Property::whereEnabled(1)->orderBy('created_at', 'desc')->limit(4)->get());
    }

    public function moreinfo(Request $request)
    {
        $text = $request->all();

        Mail::send('emails.request', ['text' => $text], function ($m) {
          $m->from('admin@uik.in.ua', 'uik.in.ua');

          $m->to('uik@ukr.net')->subject('Запрос от клиента');
        });

        return 'success';
    }

    public function callme(Request $request)
    {
        $text = $request->all();

        Mail::send('emails.callme', ['text' => $text], function ($m) use ($text) {
          $m->from('admin@uik.in.ua', 'uik.in.ua');

          $m->to('uik@ukr.net')->subject('Позвонить клиенту '. $text['phone']);
        });

        return 'success';
    }
}
