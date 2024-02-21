<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchProject extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'start_date', 'end_date', 'funding_details', 'user_id'];

    public function collaborators()
    {
        return $this->belongsToMany(User::class, 'project_user', 'project_id', 'user_id');
    }
}
