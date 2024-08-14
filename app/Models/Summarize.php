<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summarize extends Model
{
    use HasFactory;
  protected $fillable = ['id','story_id','title', 'description','status','img_url', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
//  public mixed $description;
}
