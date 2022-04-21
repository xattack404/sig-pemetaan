<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lahan extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'nama',
        'status_panen',
        'lattitude',
        'longitude',
        'jenis_tanamans_id',
    ];

    protected $searchableFields = ['*'];

    public function jenisTanamans()
    {
        return $this->belongsTo(JenisTanamans::class);
    }

    public function panens()
    {
        return $this->hasMany(Panen::class);
    }
}
