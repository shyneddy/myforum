<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'user_id',
        'content',
        'parent_id',

    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function question(){
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    public function parent(){
        return $this->belongsTo(Answer::class, 'parent_id', 'id');
    }

    public function answers(){
        return $this->hasMany(Answer::class, 'parent_id', 'id');
    }

    public function recursive(){
        return $this->answers->flatMap(function($answer){
            return $answer->recursive()->prepend($answer);
        });
    }

    // public function allAnswers(){
    //     return $this->answers()->with('allAnswers');
    // }

}
