<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LimitStok extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['limit'];

    protected $searchableFields = ['*'];

    protected $table = 'limit_stoks';
}
