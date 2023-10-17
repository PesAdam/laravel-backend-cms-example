<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_name',
        'project_text',
        'project_image',
        'project_link',
        'project_rating',
        'project_category',
        'created_at',
        'updated_at'
    ];
}
