<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'organisation_id',
    ];

    public function resolutions()
    {
        return $this->belongsToMany(Resolution::class, 'applicant_resolution');
    }

    public function organisation()
    {
        return $this->belongsTo(Organization::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'createdBy');
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'organisation_id' => $this->organisation_id,
        ];
    }
}
