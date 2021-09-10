<?php

namespace App\Models;

use Storage;
use Intervention\Image\Facades\Image;

class Product extends BaseModel
{
    public function getPhotoDataUrlAttribute(): ?string
    {
      return Storage::exists($this->photo_path) 
        ? Image::make(Storage::get($this->photo_path))->encode('data-url') 
        : null;
    }
}
