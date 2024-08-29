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
  public function getListPhotoAttribute()
  {
    $array_image = [];
    if ($this->thumbnail_url) {
      $array_image = explode(',', $this->thumbnail_url);
    }
    return $array_image;
  }

  public function getDefaultThumbnailAttribute()
  {
    $array_image = $this->listPhoto;
    if (count($array_image) > 0) {
      return $array_image[0];
    } else {
      return 'https://link-anh-default.jpg';
    }
  }


}
