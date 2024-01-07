<?php

namespace App\Models;

use App\Enums\UserRole;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'photo',
        'phone',
        'address',
        'role',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get additional vendor details associated with the user.
     */
    public function vendorDetails(): HasOne
    {
        return $this->hasOne(VendorDetail::class);
    }

    /**
     * Scope a query to only include vendors.
     */
    public function scopeVendor(Builder $query): void
    {
        $query->where('role', UserRole::VENDOR);
    }

    /**
     * Scope a query to only include that matches with the filter
     */
    public function scopeFilter($query, array $filters): void
    {
        if (isset($filters['s'])) {
            $s = request('s');

            $query->where('users.id', 'like', "%{$s}%")
                ->orWhere('users.name', 'like', "%{$s}%")
                ->orWhere('users.email', 'like', "%{$s}%")
                ->orWhere('users.username', 'like', "%{$s}%")
                ->orWhere('users.phone', 'like', "%{$s}%")
                ->orWhere('users.address', 'like', "%{$s}%")
                ->orWhere('vendor_details.founded_in', 'like', "%{$s}%")
                ->orWhere('vendor_details.additional_info', 'like', "%{$s}%");
        }
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(128);
    }
}
