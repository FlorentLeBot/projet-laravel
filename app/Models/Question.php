<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $casts = [
    //     'json'=>'array'
    // ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function answers(){
        return $this->hasMany(Answer::class);
    }
}