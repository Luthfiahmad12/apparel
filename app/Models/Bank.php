<?php

/*
 * This file is part of the IndoBank package.
 *
 * (c) Andri Desmana <andridesmana.pw | andridesmana29@gmail.com>
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Bank Model.
 */
class Bank extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'banks';

    public function rekening(): HasMany
    {
        return $this->hasMany(Rekening::class);
    }
}
