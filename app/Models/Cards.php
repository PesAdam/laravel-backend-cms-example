<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'card_name',
        'card_text',
        'card_image',
        'card_color',
        'card_background_color',
        'created_at',
        'updated_at'
    ];
}
