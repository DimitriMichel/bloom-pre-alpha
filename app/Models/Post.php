<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
    ];
    
    public function author()
    {
        $this->belongsTo(User::class);
    }

    public function comments()
    {
        $this->hasMany(Comment::class, 'post_id');
    }
}
