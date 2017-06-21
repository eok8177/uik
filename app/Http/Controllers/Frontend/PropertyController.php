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

        return view('frontend.property_single',[
            'property'  => $property,
            ]);
    }
}
