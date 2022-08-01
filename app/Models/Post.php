<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function author()
    {
        // belongsTo (N:1); FK posts table (Model Post); PK users table (Model User)
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
