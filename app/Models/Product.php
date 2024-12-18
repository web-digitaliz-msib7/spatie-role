<?php

namespace App\Models;

use App\Enums\PublishedEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'harga',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean'
    ];

    public function publishDescription(): Attribute
    {
        return Attribute::make(fn() => $this->published ? PublishedEnum::getDescription((int) $this->published) : null);
    }

    public function scopeFilter($query, $params)
    {
        // search for budget item
        $query->when(@$params['search'], function ($query, $search) {
            $query->where('name', 'LIKE', "%{$search}%");
        });
    }
}
