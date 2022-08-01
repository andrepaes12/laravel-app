<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'description'
    ];

    public const RELATIONSHIP_POST_CATEGORY = 'post_categories';

    public function author()
    {
        // belongsTo (N:1); FK posts table (Model Post); PK users table (Model User)
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categories()
    {
        // belongsToMany (N:N); Model a relacionar (Category); nome da tabela que interliga Post-Category; FK Post; FK Category
        return $this->belongsToMany(Category::class, self::RELATIONSHIP_POST_CATEGORY, 'post_id', 'category_id');
    }
}
