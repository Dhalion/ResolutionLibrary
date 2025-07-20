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
        return $this->tag . " - " . $this->name;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($this->tagged_name);
        $this->save();
    }

    public function getSlugAttribute($value)
    {
        if (is_null($value)) {
            $this->attributes['slug'] = Str::slug($this->tagged_name);
            $this->save();
        }

        return $this->attributes['slug'];
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'tag' => $this->tag,
            'organization_id' => $this->organization_id,
        ];
    }
}
