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
        'location',
        'salary',
        'job_type',
        'work_mode',
        'required_skills',
        'last_date_to_apply',
        'hr_contact_name',
        'hr_email'
    ];
}
