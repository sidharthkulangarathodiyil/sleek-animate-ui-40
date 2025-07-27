<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LandingPageSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'title',
        'subtitle',
        'content',
        'settings',
        'background_image',
        'background_color',
        'text_color',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'settings' => 'array',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
