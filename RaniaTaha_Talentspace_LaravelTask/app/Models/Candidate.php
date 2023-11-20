<?php

namespace App\Models;
use App\Models\Talent_Pool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'resume',
        'linkedin_profile',
        'cover_letter',
    ];

    public function talentPool()
    {
        return $this->hasOne(Talent_Pool::class, 'candidate_id');
    }
}
