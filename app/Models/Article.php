<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Tag;
use App\Models\Comment;

class Article extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $dates = ['created_at'];

    protected $fillable = [
        'title', 'body', 'views', 'likes', 'slug', 'preview', 'created_at'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function createdAtForHumans()
    {
        return $this->created_at->diffForHumans();
    }
}
