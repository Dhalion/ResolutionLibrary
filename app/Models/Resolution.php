<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Resolution extends Model
{
    use HasFactory, HasUuids, Searchable;

    public function generateSlug(): string
    {
        $code = $this->getResolutionCode();

        return Str::slug($code . ' ' . $this->title, '-');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Resolution $resolution): void {
            if (empty($resolution->slug) && !empty($resolution->title)) {
                $baseSlug = $resolution->generateSlug();
                $slug = $baseSlug;
                $count = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $count;
                    $count++;
                }
                $resolution->slug = $slug;
            }
        });
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('slug', $value)
            ->orWhere('id', $value)
            ->firstOrFail();
    }

    protected $fillable = [
        'title',
        'tag',
        'year',
        'text',
        'status',
        'category_id',
        'council_id',
    ];

    protected $hidden = [
        'text',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function applicants()
    {
        return $this->belongsToMany(Applicant::class);
    }

    public function organisation()
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

    public function getResolutionCode(): string
    {
        return "{$this->tag}-{$this->year}";
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'tag' => $this->tag,
            'year' => $this->year,
            'text' => $this->text,
            'category_id' => $this->category->id,
            'organisation_id' => $this->organisation?->id ?? null,
        ];
    }
}
