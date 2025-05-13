<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_item';
    protected $fillable = ["name","image", "id_category", "stock", "description", ];

    public  function category() :BelongsTo{
        return $this->belongsTo(Category::class, "id_category", "id_category");

    }

    public function peminjaman()
    {
    return $this->hasMany(Peminjaman::class, "id_item", "id_item");
    }
    

}
