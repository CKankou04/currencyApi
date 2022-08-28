<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PairResource;
use App\Models\Currency;
use App\Models\Pair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pair = Pair::with('currencyfrom', 'currencyto')->get();
        return response()->json([
            
            'pairs'=> $pair,
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
        $request->validate([
            'id_currency_from'  => ['required'],
            'id_currency_to'  => ['required'],
            'rate'     => ['required'],
        ]);
        if ($request){
            $devise = Pair::create([
                'id_currency_from' => $request->id_currency_from,
                'id_currency_to' => $request->id_currency_to,
                'rate' => $request->rate
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Création de devise avec succès',
                'data' => $devise
            ], 201);
        }
        else{
            //Sinon on returne un message Paire non retrouvé
        return response()->json([
            'success' => false,
            'message' => 'Paire non trouvé'
        ], 404);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pair  $pair
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pair = Pair::find($id);
        return new PairResource($pair);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pair  $pair
     * @return \Illuminate\Http\Response
     */
    public function edit(Pair $pair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pair  $pair
     * @return \Illuminate\Http\Response
     */

     //Fonction permettant de modifier une paire
    public function update(Request $request, $id)
    {
        //validation des champs
        $request->validate([
            'id_currency_from' =>  ['required'],
            'id_currency_to' => ['required'],
            'rate' => ['required']
        ]);
        $pair = Pair::find($id);
        if($pair){
            $pair->update([
                'id_currency_from' => $request->id_currency_from,
                'id_currency_to' => $request->id_currency_to,
                'rate' => $request->rate
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Paire mise à jour avec succès',
                'data' => $pair
            ], 200);
        }
        else{
            //Sinon on returne un message Paire non retrouvé
        return response()->json([
            'success' => false,
            'message' => 'Paire non crée'
        ], 404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pair  $pair
     * @return \Illuminate\Http\Response
     */

     //Suppression d'une paire
    public function destroy(Pair $pair)
    {
        //si la paire existe, on la supprime
        if ($pair) {
            $pair->delete();

            return response()->json([
                'success' => true,
                'message' => 'Suppression de la paire effectuée avec succès'
            ], 200);
        }
        //Sinon on returne un message Paire non retrouvé
        return response()->json([
            'success' => false,
            'message' => 'Paire non trouvé'
        ], 404);
    }

    //Fonction permettant de convertir d'une devise en une autre 
    public function converts($currency_from, $currency_to, $price, $reverse = false)
    {
        $codeCurrencyFrom = Currency::where('currency_code', $currency_from)->first();
        $codeCurrencyTo = Currency::where('currency_code', $currency_to)->first();
       
        if(isset($codeCurrencyFrom)){
            if(isset($codeCurrencyTo)){
                $pair = Pair::with('currencyfrom', 'currencyfrom')
                    ->where('id_currency_from', $codeCurrencyFrom->id)
                    ->where('id_currency_to', $codeCurrencyTo->id)->first();
            }
            else{
                return response()->json([
                    'success' => false,
                    'message' => 'la deuxième currency non trouvé'
                ], 404);
            }
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Devise 1 non trouvée'
            ], 404);
        }
        if($pair) {
            if ($reverse == 'true') {
                $currencyConverted = $price * (1/$pair->rate);
                $request = $pair->count + 1;
                DB::table('pairs')
                    ->where('id', $pair->id)
                    ->update(['count' => $request]);

                $data = [
                    'price_from'      => $price,
                    'currency_from'   => $currency_to,
                    'price_to'        => $currencyConverted,
                    'currency_to'     => $currency_from,
                    'Requête'         => $request
                ];
            } else {
                $currencyConverted = $price * $pair->rate;
                $request = $pair->count + 1;
                DB::table('pairs')
                    ->where('id', $pair->id)
                    ->update(['count' => $request]);

                $data = [
                    'price_from'        => $price,
                    'currency_from'     => $currency_from,
                    'price_to'          => $currencyConverted,
                    'currency_to'       => $currency_to,
                    'Requête'           => $request,
                ];

            }
            return response()->json([
                'status' => true,
                'convert'=> $data,
            ], 200);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Conversion impossible paire non trouvée'
            ], 404);
        }
    }
}
