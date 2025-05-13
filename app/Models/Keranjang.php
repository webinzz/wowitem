<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keranjang extends Model
{
    protected $fillable = ['id_user', 'id_item'];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, "id_item", "id_item");
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "id_user", "id");
    }
}
