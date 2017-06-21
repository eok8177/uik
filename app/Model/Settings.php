<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

    /**
     * @var array  fields to save
     */
    protected $fillable = [
        'key',
        'name',
        'value',
    ];
}
