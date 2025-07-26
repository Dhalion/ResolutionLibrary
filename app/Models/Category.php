<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Category extends Model
{
    use HasFactory, HasUuids, Searchable;

    protected $fillable = [
        'name',
        'tag',
        'organization_id',
        'image',
        'slug',
    ];

    protected $appends = [
        'tagged_name',
    ];

    public function resolutions()
    {
        return $this->hasMany(Resolution::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'createdBy');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updatedBy');
    }

    public function getTaggedNameAttribute()
    {
        return ($this->attributes['tag'] ?? '') . ' - ' . ($this->attributes['name'] ?? '');
    }

    public function generateSlug(): string
    {
        return Str::slug(($this->tag ? $this->tag . ' ' : '') . $this->name, '-');
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->attributes['id'] ?? null,
            'name' => $this->attributes['name'] ?? null,
            'tag' => $this->attributes['tag'] ?? null,
            'organization_id' => $this->attributes['organization_id'] ?? null,
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Category $category): void {
            if (empty($category->slug) && !empty($category->name)) {
                $baseSlug = $category->generateSlug();
                $slug = $baseSlug;
                $count = 1;

                while (static::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $count;
                    $count++;
                }

                $category->slug = $slug;
            }
        });
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('slug', $value)->firstOrFail();
    }
}
