<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Helpers\Traits\AvoidsDeletionConflicts;
use LaravelEnso\Tables\Traits\TableCache;


class Currency extends Model
{
    use HasFactory;
    //use AvoidsDeletionConflicts, HasFactory, TableCache;

    protected $guarded = ['id'];

    public function fromPair()
    {
        return $this->hasMany(Pairs::class, 'id_currency_from');
    }

    public function toPair()
    {
        return $this->hasMany(Pairs::class, 'id_currency_to');
    }

    
}
