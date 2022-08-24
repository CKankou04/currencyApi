<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{
    use HasFactory;
    public function currency(){
        return $this->hasMany(Currencies::class);
    }

   // use AvoidsDeletionConflicts, HasFactory, TableCache;

    protected $guarded = ['id'];

    public function currencyfrom()
    {
        return $this->belongsTo(Currency::class, 'id_currency_from');
    }

    public function currencyto()
    {
        return $this->belongsTo(Currency::class, 'id_currency_to');
    }
}
