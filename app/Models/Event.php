<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    protected $casts = [
        'event_date' => 'date',
    ];
    protected $fillable = [
        'name',
        'event_date',
        'discipline_id',
    ];

    public function discipline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class);
    }

    public function results(): HasMany
    {
        return $this->hasMany(Result::class);
    }
}
