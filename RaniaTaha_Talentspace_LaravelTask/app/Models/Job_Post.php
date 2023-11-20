<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_Post extends Model
{
    use HasFactory;
    protected $table = "job_posts";

    protected $fillable = [
        'title',
        'location',
        'job_type',
        'deadline',
        'responsibility',
        'qualifications',
        'job_description',
    ];
}
