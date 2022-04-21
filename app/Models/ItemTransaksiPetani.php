<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemTransaksiPetani extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'stok',
        'harga',
        'panen_id',
        'transaksi_petani_id',
        'user_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'item_transaksi_petanis';

    public function panen()
    {
        return $this->belongsTo(Panen::class);
    }

    public function transaksiPetani()
    {
        return $this->belongsTo(TransaksiPetani::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
