<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Convert;
use App\Models\Currency;
use App\Models\Pair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $codeFrom = Currency::where('code', $currency_from)->first();
            $codeTo = Currency::where('code', $currency_to)->first();
            $pair = Pair::with(['from', 'to', 'conversion'])
                ->where('id_currency_from', $codeFrom->id)
                ->where('id_currency_to', $codeTo->id)->first()
            ;
            
            if ($reverse == true) {
                $converted = $price * 1/$pair->rates;
    
                $conversion = DB::table('conversions')->insertGetId([
                    'pair_id' => $pair->id,
                ]);
    
                $data = [
                    'amount_currecy_from'   => $price,
                    'from'                  => $currency_to,
                    'amount_currency_to'    => $converted,
                    'to'                    => $currency_from,
                    'conversion'            => $conversion
                ];
            } else {
                $converted = $price * $pair->rates;
    
                $conversion = DB::table('converts')->insertGetId([
                    'pair_id' => $pair->id,
                ]);
    
                $data = [
                    'amount_currency_from' => $price,
                    'from'                 => $currency_from,
                    'amount_currency_to'   => $converted,
                    'to'                   => $currency_to,
                    'conversion'            => $conversion
                ];
    
            }
    
            return response()->json([
                'status' => true,
                'convert'=> $data,
            ]);
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
