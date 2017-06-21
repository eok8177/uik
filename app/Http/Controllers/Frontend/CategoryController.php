<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;

use App\Model\Category;
use App\Model\Page;

class CategoryController extends FrontendController
{

    public function show($slug)
    {
        $category = Category::whereSlug($slug)->whereEnabled(1)->firstOrFail();

        return view('frontend.category',[
            'category'  => $category,
            ]);
    }
}
