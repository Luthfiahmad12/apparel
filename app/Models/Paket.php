<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fitur(): HasMany
    {
        return $this->hasMany(Fitur::class);
    }
}
