<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Question extends Model
{
    use HasFactory, Searchable;
    protected $table = 'questions';

    protected $fillable = [
        'title',
        'content',
        'viewcount',
        'category_id',
        'user_id',
        'issolved',
        'rate',
        'likecount',
        'dislikecount',
        'slug',
        'hashtag_id'

    ];

    public function answers(){
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }

    public function likes(){
        return $this->hasMany(Like::class, 'question_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function hashtag(){
        return $this->belongsTo(Hashtag::class, 'hashtag_id', 'id');
    }

    public function toSearchableArray()
    {
        $array = $this->only('title', 'content');
        
        return $array;
    }
}
