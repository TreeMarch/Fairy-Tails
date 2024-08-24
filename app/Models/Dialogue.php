<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Dialogue extends Model
{
  use SoftDeletes;

  protected $table = 'dialogues';


  protected $fillable = [
    'content',
    'chapter_id',
    'created_at',
    'updated_at',
    'deleted_at',
    'created_by',
    'updated_by',
    'deleted_by'
  ];

  public $timestamps = true;
}
