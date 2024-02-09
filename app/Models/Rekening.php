<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rekening extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bank(): BelongsTo
    {
        return $this->BelongsTo(Bank::class, 'id_bank');
    }
}
