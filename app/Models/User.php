<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // relacionamento User::Address
    public function addressDelivery()
    {
        // hasOne(1:1); FK addresses table (Model Address): user_id; PK users table (Model User): id
        return $this->hasOne(Address::class, 'user_id', 'id');
        // em seguida, criar a rota e o seu respectivo controlador
    }

    // relacionamento User::Post
    public function posts()
    {
        // hasMany(1:N); FK posts table (Model Post): user_id; PK users table (Model User): id
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    // relacionamento User::Post::Comment
    public function commentsOnMyPost()
    {
        //hasManyThrough (1:1:N); Relacionar com comments table; Através da posts table; FK posts->User; FK comments->Post; PK users; PK Post)
        return $this->hasManyThrough(Comment::class, Post::class, 'user_id', 'post_id', 'id', 'id');
    }
}
