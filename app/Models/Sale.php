<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends BaseModel
{
    protected $casts = [
        'total_value'          => 'decimal:2',
        'discount_total_value' => 'decimal:2'
    ];

    protected $appends = [
        'discount_total_value'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function sale_situation(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function getDhSoldAttribute(string $value): string
    {
      return date('d/m/Y', strtotime($value));
    }
}
