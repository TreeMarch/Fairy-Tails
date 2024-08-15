<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    protected $fillable = ['id','story_id','account_id','title', 'description','thumbnails_url', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];

}
