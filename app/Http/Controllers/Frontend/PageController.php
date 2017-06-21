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

        return view('frontend.page',[
            'page'  => $page,
            ]);
    }
}
