<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = ['answer','question_id', 'visitor_id'];

    public function question(){
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function visitor(){
        return $this->belongsTo(Visitor::class, 'visitor_id');
    }
}
