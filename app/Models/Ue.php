<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ue extends Model
{
    use HasFactory;
    protected $fillable = [
        'code','nom','credits_ects','semestre'
    ];

    public function ec(): HasMany {
        return $this->hasMany(Ec::class);
    }
}
