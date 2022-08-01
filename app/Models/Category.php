<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function posts()
    {
        //belongsToMany (N:N); Relacionar com Post; através da table N:N; FK relationship->categories; FK relationship->posts
        return $this->belongsToMany(Post::class, Post::RELATIONSHIP_POST_CATEGORY, 'category_id', 'post_id');
    }

}
