<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Developer extends Model
{
    use HasFactory;
    protected $guarded = [], $casts = ['skills' => 'array'];

    public function skills()
    {
        return implode(',', $this->skills);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
