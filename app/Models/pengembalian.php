<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class pengembalian extends Model
{
    use HasFactory;

    protected $fillable = ["id_item","id_user","id_peminjaman","bukti_img","status"];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, "id_item", "id_item");
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "id_user", "id");
    }
    
    public function peminjaman(): BelongsTo
    {
        return $this->belongsTo(Peminjaman::class, "id_peminjaman", "id_peminjaman");
    }
}
