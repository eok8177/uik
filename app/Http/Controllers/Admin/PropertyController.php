<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Property;
use App\Model\PropertyImage;
use App\Http\Requests\PropertyRequest;

use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    private $types = [
        'Дім' => 'Дім',
        'Квартира' => 'Квартира',
        'Ділянка' => 'Ділянка',
        'Комерційна' => 'Комерційна',
        'Аренда' => 'Аренда',
        'Різне' => 'Різне',
    ];
    private $classifications = [
        'Новобуд' => 'Новобуд',
        'Вторинне' => 'Вторинне',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $items = Property::orderBy('created_at', 'desc');

        return view('admin.property.index', [
            'property' => $items->get(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.property.create',[
            'types' => $this->types,
            'classifications' => $this->classifications,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request, Property $property)
    {
        $data = $request->all();
        unset($data['image']);
        $property = $property->create($data);

        if ($imageMain = $request->image) {
            $property->image = $imageMain->store('uploads/'.$property->id, 'public');
        }
        $property->save();

        foreach ((array)$request->images as $image) {
            $filename = $image->store('uploads/'.$property->id, 'public');
            PropertyImage::create([
                'property_id' => $property->id,
                'title' => $filename
            ]);
        }

        return redirect()->route('admin.property.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return redirect()->to('/property/'.$property->slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return view('admin.property.edit', [
            'property' => $property,
            'types' => $this->types,
            'classifications' => $this->classifications,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request, Property $property)
    {
        $data = $request->all();
        if ($imageMain = $request->image) {
            Storage::disk('public')->delete($property->image);
            $data['image'] = $imageMain->store('uploads/'.$property->id, 'public');
        }
        $property->update($data);

        foreach ((array)$request->images as $image) {
            $filename = $image->store('uploads/'.$property->id, 'public');
            PropertyImage::create([
                'property_id' => $property->id,
                'title' => $filename
            ]);
        }

        return redirect()->route('admin.property.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        Storage::disk('public')->deleteDirectory('uploads/'.$property->id);
        // $property->images->delete();
        $property->delete();
        return 'success';
    }

    public function deleteimage(PropertyImage $image)
    {
        $property = $image->property;
        $title = $image->title;
        Storage::disk('public')->delete($title);
        $image->delete();

        return redirect()->route('admin.property.edit', ['id' => $property]);
    }
}
