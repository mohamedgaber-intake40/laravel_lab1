<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     //comment
     public function post()
    {
        return $this->belongsTo('App\Post');
    }
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
    
    protected $fillable=[
        'title',
        'description',
        'user_id',
        'avatar'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getHumanReadableDateAtrribute()
    {
        return $this->create_at->diffForHumans();
    }
}
