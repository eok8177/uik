<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (auth()->check());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => 'required'
        ];
        $images = count($this->input('images'));
        foreach(range(0, $images) as $index) {
            $rules['images.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
        }
        
        return $rules;
    }
}
