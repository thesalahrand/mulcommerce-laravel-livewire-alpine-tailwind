<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Brand extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'logo',
        'email',
        'phone',
        'website',
        'country_of_origin',
        'founded_in',
        'additional_info',
        'is_active'
    ];

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
        // if ($filters['tag'] ?? false) {
        //     $query->where('tags', 'like', '%' . request('tag') . '%');
        // }

        if ($filters['s'] ?? false) {
            $s = request('s');

            $query->where('name', 'like', "%{$s}%")
                ->orWhere('slug', 'like', "%{$s}%")
                ->orWhere('email', 'like', "%{$s}%")
                ->orWhere('phone', 'like', "%{$s}%")
                ->orWhere('website', 'like', "%{$s}%")
                ->orWhere('country_of_origin', 'like', "%{$s}%")
                ->orWhere('founded_in', 'like', "%{$s}%")
                ->orWhere('additional_info', 'like', "%{$s}%");
        }
    }

}
