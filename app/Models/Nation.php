<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nation extends Model
{
    protected $fillable = [
        'code',
        'name',
    ];

    public function athletes(): HasMany
    {
        return $this->hasMany(Athlete::class);
    }
}
