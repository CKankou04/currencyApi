<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Convert;
use App\Models\Currency;
use App\Models\Pair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ConvertCurrencyRequest;

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
    
        public function converts($currency_from, $currency_to, $price, $reverse = false)
        {
            $codeCurrencyFrom = Currency::where('currency_code', $currency_from)->first();
            $codeCurrencyTo = Currency::where('currency_code', $currency_to)->first();
            $pair = Pair::with(['currencyfrom', 'currencyfrom', 'convert'])
                ->where('id_currency_from', $codeCurrencyFrom->id)
                ->where('id_currency_to', $codeCurrencyTo->id)->first()
            ;
            
             if ($reverse == true) {
                $currencyConverted = $price * 1 /$pair->rate;
    
                $conversion = DB::table('converts')->getByID([
                    'id_pair' => $pair->id,
                ]);
    
                $data = [
                    'price_from'        => $price,
                    'currency_from'     => $currency_to,
                    'price_to'          => $currencyConverted,
                    'currency_to'       => $currency_from,
                    'conversion'        => $conversion
                ];
            } else { 
                $currencyConverted = $price * $pair->rate;
    
                $conversion = DB::table('converts')->insertGetId([
                    'pair_id' => $pair->id,
                ]);
    
                $data = [
                    'price_from'       => $price,
                    'currency_from'    => $currency_from,
                    'price_to'         => $currencyConverted,
                    'currency_to'      => $currency_to,
                    'conversion'       => $conversion
                ];
    
            
            $pair->convertion()->increment('nb_count');

    
            return response()->json([
                'status' => true,
                'convert'=> $data,
            ]);
        }    
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Convert a quantity of currency from an existant pairs
     *
     * @return \Illuminate\Http\Response
     */
    public function decompte()
    {
        $pairs = Pair::getAll();

        return $this->sendResponse($pairs, 'Paire retrouvé avec succès.');

    }


    
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
