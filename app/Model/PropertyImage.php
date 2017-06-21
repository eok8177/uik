<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    protected $table = 'property_images';

    protected $fillable = ['property_id', 'title'];
    
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
