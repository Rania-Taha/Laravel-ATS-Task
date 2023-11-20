<?php

namespace App\Models;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talent_Pool extends Model
{
    use HasFactory;
    protected $table = "talent_pools";

    protected $fillable = [
        'candidate_id',
        'skills',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }
}
