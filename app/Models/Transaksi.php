<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'stok',
        'harga',
        'detail_transaksi_id',
        'barang_id',
        'user_id',
    ];

    protected $searchableFields = ['*'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function detailTransaksi()
    {
        return $this->belongsTo(DetailTransaksi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
