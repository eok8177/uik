<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Settings;
use App\Http\Requests\SettingsRequest;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index', ['settings' => Settings::all()]);
    }

    public function mupdate(SettingsRequest $request)
    {

        foreach ($request->input('settings') as $key => $item) {
            Settings::where('id', $key)->update(['value' => $item]);
        }

        return redirect()->route('admin.settings.index');
    }

}
