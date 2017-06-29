<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;

use App\Model\Page;

class PageController extends FrontendController
{

    public function show($slug)
    {
        $page = Page::whereSlug($slug)->whereEnabled(1)->firstOrFail();

// Cokie page views Count
        $visits = (isset($_COOKIE["visits_post"])) ? $_COOKIE["visits_post"] : false;
        if (!isset($visits[$slug])) {
            setcookie("visits_post[$slug]",1,time()+3600*24*365);
            $page->visits = $page->visits + 1;
            $page->save();
        }

        return view('frontend.page',[
            'page'  => $page,
            ]);
    }
}
