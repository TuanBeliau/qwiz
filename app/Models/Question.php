<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Quiz;
use App\Models\QuestionOption;

class Question extends Model
{
    protected $fillable = [
        'quiz_id',
        'question_text',
        'question_type',
        'points',
    ];

    public function quiz(): BelongsTo 
    {
        return $this->belongsTo(Quiz::class);
    }

    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class);
    }
}
