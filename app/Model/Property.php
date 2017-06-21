<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Property extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'properties';

    /**
     * @var array  fields to save
     */
    protected $fillable = [
        'slug',
        'title',
        'preview',
        'description',
        'price',
        'image',
        'type',
        'rooms',
        'classification',
        'floor',
        'address',
        'total_area',
        'living_area',
        'kitchen_area',
        'land_area',
        'status',
        'enabled',
    ];

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }
}
