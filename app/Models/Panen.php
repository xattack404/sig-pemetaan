<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Panen extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['stok', 'harga', 'lahan_id'];

    protected $searchableFields = ['*'];

    public function lahan()
    {
        return $this->belongsTo(Lahan::class);
    }

    public function itemTransaksiPetanis()
    {
        return $this->hasMany(ItemTransaksiPetani::class);
    }
}
