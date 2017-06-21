<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'partners';

    /**
     * @var array  fields to save
     */
    protected $fillable = [
        'slug',
        'title',
        'image',
        'enabled',
    ];
}
