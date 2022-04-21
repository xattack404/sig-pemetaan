<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransaksiPetani extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['user_id', 'total'];

    protected $searchableFields = ['*'];

    protected $table = 'transaksi_petanis';

    public function itemTransaksiPetanis()
    {
        return $this->hasMany(ItemTransaksiPetani::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
