<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chapter extends Model
{
  use HasFactory;

  protected $fillable = [
    'id',
    'story_id',
    'heading',
    'description',
    'thumbnails_url',
    'deleted_at',
    'created_by',
    'updated_by',
    'deleted_by'
  ];

  // Thiết lập quan hệ với model Dialogue
  public function dialogues(): HasMany
  {
    return $this->hasMany(Dialogue::class, 'chapter_id', 'id');
  }

}
