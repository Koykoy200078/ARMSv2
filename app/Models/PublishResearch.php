<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublishResearch extends Model
{
    use HasFactory;

    protected $table = 'publish_research';
    protected $fillable = ['title', 'author', 'publication_date', 'conference_journal_info'];
}
