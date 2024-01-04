<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Vite;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $fillable = [
        'isbn',
        'name',
        'description',
        'price',
        'old_price',
        'discount',
        'author_id',
        'publisher_id',
        'quantity',
        'published',
        'year',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('products')
            ->useDisk('products');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb-products')
            ->width(398)
            ->height(572);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class)->withPivot('value');
    }

    public function scopePublished(Builder $query): void
    {
        $query->where('published', 1);
    }

    public function getImage()
    {
        return $this->getFirstMediaUrl('products', 'thumb-products') ?: Vite::image('empty/image_not_available.jpg');
    }
}
