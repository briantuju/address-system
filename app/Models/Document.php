<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'file_name',
        'mime_type',
        'path',
        'size',
        'address_id',
        'meta'
    ];

    protected $casts = [
        'meta' => 'array',
        'size' => 'float'
    ];

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
}
