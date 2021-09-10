<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Storage;

trait File
{
  public function upload(Request $request, ?Model $model = null): array
  {
    if (!$request->has('photo')) {
      return ['photo_path' => optional($model)->photo_path];
    }

    $photoPath = optional($model)->photo_path !== null
      ? $model->photo_path
      : "files/{$request->photo->hashName()}";

    Storage::put($photoPath, $request->photo->get());

    return ['photo_path' => $photoPath];
  }
}
