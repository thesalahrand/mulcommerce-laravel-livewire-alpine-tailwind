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
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model implements HasMedia
{
    use HasFactory, HasSlug, SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'photo',
        'additional_info',
        'is_active'
    ];

    /**
     * Get the subcategories for the category.
     */
    public function subcategories(): HasMany
    {
        return $this->hasMany(Subcategory::class);
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

            $query->where('id', 'like', "%{$s}%")
                ->orWhere('name', 'like', "%{$s}%")
                ->orWhere('slug', 'like', "%{$s}%")
                ->orWhere('additional_info', 'like', "%{$s}%");
        }
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(128);
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::deleted(function (Category $category) {
            $category->subcategories()->delete();
        });
    }
}
