<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Patient extends Model
{
    protected $table = 'patients';
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
