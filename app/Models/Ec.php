<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ec extends Model
{
    protected $fillable = [
        'code',
        'nom',
        'coefficient',
        'ue_id'
    ];

    public function ue(): BelongsTo {
        return $this->belongsTo(Ue::class);
    }
    public function note(): HasMany {
        return $this->hasMany(Note::class);
    }
}
