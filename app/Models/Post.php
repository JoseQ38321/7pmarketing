<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title' ,
                'onUpdate' => 'true'
            ]
        ];
    }

    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function image()
    {
        return $this->morphToMany(File::class, 'fileable');
    }

    public function seo()
    {
        return $this->morphOne('App\Models\Seo', 'seoable');
    }

    public function getSummaryAttribute()
    {
        return substr($this->abstract, 0, 150).'...';
    }

    public function getImageAttribute()
    {
        return Storage::url($this->image()->first()->file_path);
    }
}
