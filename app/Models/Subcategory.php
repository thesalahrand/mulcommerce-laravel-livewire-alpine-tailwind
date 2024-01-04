<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subcategory extends Model implements HasMedia
{
    use HasFactory, HasSlug, SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'photo',
        'additional_info',
        'is_active'
    ];

    /**
     * Get the category that owns the subcategory.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Scope a query to only include that matches with the filter
     */
    public function scopeFilter($query, array $filters): void
    {
        if (isset($filters['s'])) {
            $s = request('s');

            $query->where('subcategories.id', 'like', "%{$s}%")
                ->orWhere('subcategories.name', 'like', "%{$s}%")
                ->orWhere('subcategories.slug', 'like', "%{$s}%")
                ->orWhere('subcategories.additional_info', 'like', "%{$s}%");
        }
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(128);
    }
}
