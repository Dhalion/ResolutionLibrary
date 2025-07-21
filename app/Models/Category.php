<?php

declare(strict_types=1);


namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        "name",
        "tag",
        "organization_id",
        "image",
        "slug",
    ];

    protected $appends = [
        "tagged_name"
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
        return $this->belongsTo(User::class, "createdBy");
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, "updatedBy");
    }

    public function getTaggedNameAttribute()
    {
        return ($this->attributes['tag'] ?? '') . " - " . ($this->attributes['name'] ?? '');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;

        // Only set slug if not manually provided
        if (empty($this->attributes['slug'])) {
            if (!empty($this->attributes['tag'])) {
                $this->attributes['slug'] = Str::slug($this->attributes['tag'] . " - " . $value);
            } else {
                $this->attributes['slug'] = Str::slug($value);
            }
        }
    }

    public function getSlugAttribute($value)
    {
        if (is_null($value)) {
            if (!empty($this->attributes['tag'])) {
                return Str::slug($this->attributes['tag'] . " - " . $this->attributes['name']);
            }
            return Str::slug($this->attributes['name'] ?? '');
        }

        return $value;
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
}
