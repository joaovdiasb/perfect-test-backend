<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
  /**
   * @var array
   */
  protected $guarded = ['id'];

  public function getCreatedAtAttribute(string $value): string
  {
    return date('d/m/Y', strtotime($value));
  }

  public function getUpdatedAtAttribute(string $value): string
  {
    return date('d/m/Y', strtotime($value));
  }
}
