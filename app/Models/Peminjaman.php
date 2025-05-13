<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    protected $primaryKey = 'id_peminjaman';

    use HasFactory;

    protected $fillable = ["id_item","id_user","jumlah","tgl_kembali","jam_kembali","status"];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, "id_item", "id_item");
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "id_user", "id");
    }
}
