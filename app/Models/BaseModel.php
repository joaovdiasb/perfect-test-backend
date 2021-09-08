<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, Factories\HasFactory};

class BaseModel extends Model
{
  use HasFactory;

  /**
   * @var array
   */
  protected $guarded = ['id'];

  /**
   * Mutator date
   *
   * @param string|null $value
   * @return void
   */
  public function getCreatedAtAttribute(?string $value): string
  {
    return date('d/m/Y', strtotime($value));
  }

  /**
   * Mutator date
   *
   * @param string|null $value
   * @return void
   */
  public function getUpdatedAtAttribute(?string $value): string
  {
    return date('d/m/Y', strtotime($value));
  }
}
