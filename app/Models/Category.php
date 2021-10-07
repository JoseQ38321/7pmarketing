<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name' ,
                'onUpdate' => 'true'
            ]
        ];
    }

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'categorizable');
    }

    public function resources()
    {
        return $this->morphedByMany(Resource::class, 'categorizable');
    }
}
