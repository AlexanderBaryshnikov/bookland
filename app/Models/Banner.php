<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'title',
        'published',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopePublished(Builder $query): void
    {
        $query->where('published', 1);
    }
}
