<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'beritas';
    protected $guarded = [''];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'penulis', 'id');
    }
}
