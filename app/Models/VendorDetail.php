<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VendorDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'founded_in',
        'additional_info'
    ];

    /**
     * Get the user associated with the details.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
