<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'avatar',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class);
    }

    public function itemTransaksiPetanis()
    {
        return $this->hasMany(ItemTransaksiPetani::class);
    }

    public function transaksiPetanis()
    {
        return $this->hasMany(TransaksiPetani::class);
    }

    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('super-admin');
    }
}
