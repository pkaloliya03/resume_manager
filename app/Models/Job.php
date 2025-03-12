<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'company_name', 
        'education',
        'experience',
        'description', 
        'location', 
        'salary'
    ];
}
