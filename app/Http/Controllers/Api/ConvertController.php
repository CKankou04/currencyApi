<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Convert;
use App\Models\Currency;
use App\Models\Pair;
use Illuminate\Http\Request;

class ConvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    public function converts($currency_from, $currency_to, $amount, $inverse = false)
        {

            $currencyfrom = Currency::where('currency_code',$currency_from)->first;
            $currencyto = Currency::where('currency_code',$currency_to)->first;
            $pair = Pair::with(['currencyfrom', 'currencyto'])->where('id_currency_from',$currencyfrom->id)->where('id_currency_to',$currencyto->id);
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convert  $convert
     * @return \Illuminate\Http\Response
     */
    public function show(Convert $convert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Convert  $convert
     * @return \Illuminate\Http\Response
     */
    public function edit(Convert $convert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Convert  $convert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convert $convert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Convert  $convert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convert $convert)
    {
        //
    }
}
