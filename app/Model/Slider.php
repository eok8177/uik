<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sliders';

    /**
     * @var array  fields to save
     */
    protected $fillable = [
        'slug',
        'title',
        'description',
        'image',
        'enabled',
    ];
}
