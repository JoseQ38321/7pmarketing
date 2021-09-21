<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class File extends Model
{
    protected $guarded = ['id'];

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'fileable');
    }
}


