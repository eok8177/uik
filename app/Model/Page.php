<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Page extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * @var array  fields to save
     */
    protected $fillable = [
        'category_id',
        'slug',
        'title',
        'preview',
        'description',
        'image',
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

    /**
     * Get the Category that owns the page.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
