<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'type',
        'category',
        'scale_min',
        'scale_max',
        'choices',
        'scale_questions',
        'parent_question_id'
    ];

    protected $casts = [
        'choices' => 'array',
        'scale_questions' => 'array'
    ];

    public function parent()
    {
        return $this->belongsTo(Question::class, 'parent_question_id');
    }

    public function children()
    {
        return $this->hasMany(Question::class, 'parent_question_id');
    }
}
