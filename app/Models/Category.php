<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function Blogs()
    {
        return $this->hasMany(Blog::class, 'cat_id'); //Category -> category_id
    }
}
