<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questions extends Model
{
    use HasFactory;
    protected $fillable = [   
        'question',
        'answer_one',
        'answer_two',
        'answer_three',
        'answer_four',
        'correct_answer',
        'category',
    ];

}
