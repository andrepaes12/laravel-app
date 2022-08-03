<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    // poliformismo
    public function comments()
    {
        // Relacionamento com Comment; método item do Model Comment
        return $this->morphMany(Comment::class, 'item');
    }

    // Mutator: método a ser usado quando for invocado pelo controlador / view
    // neste caso está formatando a data do campo created_at
    public function getCreatedFmtAttribute()
    {
        return date('d/m/Y H:i', strtotime($this->created_at));
    }

    // Accessor
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
