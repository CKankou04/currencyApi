<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{
    use HasFactory;
   
   // use AvoidsDeletionConflicts, HasFactory, TableCache;

   protected $fillable = ['id_currency_from', 'id_currency_to', 'rate'];

    public function currencyfrom()
    {
        return $this->belongsTo(Currency::class, 'id_currency_from');
    }

    public function currencyto()
    {
        return $this->belongsTo(Currency::class, 'id_currency_to');
    }
    public function convert()
    {
        return $this->belongsTo(Convert::class);
    }
}
