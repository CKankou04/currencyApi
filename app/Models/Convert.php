<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convert extends Model
{
    use HasFactory;
    protected $fillable = ['id_pair', 'nb_count'];

    public function pair()
    {
        return $this->belongsTo(Pair::class);
    }
}
