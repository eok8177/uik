<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AjaxController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.dashboard.index');
    }


    public function status(Request $request)
    {
        if($request->ajax()){

            $model = "App\Model\\" . $request->input('model');

            $item = $model::find($request->input('id'));

            $item->enabled = 1 - $item->enabled;
            $item->save();

            $response = [
                "id" => $item->id,
                "enabled" => $item->enabled
                ];
            return json_encode($response);
        }

        return redirect()->route('admin.dashboard');
    }


    public function changeCourse(Request $request)
    {
        if($request->ajax()){

            $data = $request->all();

            $model = "App\Model\\" . $data['model'];
            unset($data['model']);

            $item = $model::find($data['id']);

            $item->update($data);

            $response = [
                "status" => true,
                ];
            return json_encode($response);
        }

        return redirect()->route('admin.dashboard');
    }

    public function addCourse(Request $request)
    {
        if($request->ajax()){

            $data = $request->all();

            $model = "App\Model\\" . $data['model'];

            $item = new $model;

            $item->course_id = $data['course_id'];

            $item->date = date("Y-m-d");
            if ($data['model'] == 'Exam') $item->time = date("H:i:s");
            if ($data['model'] == 'Set') $item->status = 'open';

            $item->save();

            $response = [
                "status" => true,
                "id" => $item->id,
                "date" => $item->date,
                "model" => $data['model'],
                ];
            return json_encode($response);
        }

        return redirect()->route('admin.dashboard');
    }

    public function deleteCourse(Request $request)
    {
        if($request->ajax()){

            $data = $request->all();

            $model = "App\Model\\" . $data['model'];

            $item = $model::find($data['id']);

            $item->delete();

            $response = [
                "status" => true,
                ];
            return json_encode($response);
        }

        return redirect()->route('admin.dashboard');
    }

}
