<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;

use App\Model\Property;

class PropertyController extends FrontendController
{
    public function index(Request $request)
    {
        $property = Property::whereEnabled(1);

        if ($type = $request->type) {
            $property->whereType($type);
        }

        return view('frontend.property',[
            'property'  => $property->get(),
            ]);
    }

    public function show($slug)
    {
        $property = Property::whereSlug($slug)->whereEnabled(1)->firstOrFail();

// Cokie page views Count
        $visits = (isset($_COOKIE["visits_post"])) ? $_COOKIE["visits_post"] : false;
        if (!isset($visits[$slug])) {
            setcookie("visits_post[$slug]",1,time()+3600*24*365);
            $property->visits = $property->visits + 1;
            $property->save();
        }

        return view('frontend.property_single',[
            'property'  => $property,
            ]);
    }
}
