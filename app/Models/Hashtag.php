<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    use HasFactory;

    protected $table = 'hashtags';

    protected $fillable = [
        'name',

    ];

    public function questions(){
        return $this->hasMany(Question::class, 'hashtag_id', 'id');
    }
}
