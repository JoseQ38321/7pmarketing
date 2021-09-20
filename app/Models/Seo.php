<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function seoable()
    {
        return $this->morphTo();
    }
}
