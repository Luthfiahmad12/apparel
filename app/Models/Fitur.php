<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fitur extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function paket(): BelongsTo
    {
        return $this->belongsTo(Paket::class);
    }
}
