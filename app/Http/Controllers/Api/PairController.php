<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pair;
use Illuminate\Http\Request;

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
        $devise = Pair::create([
            'id_currency_from' => $request->id_currency_from,
            'id_currency_to' => $request->id_currency_to,
            'rate' => $request->rate
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Devise crée',
            'data' => $devise
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pair  $pair
     * @return \Illuminate\Http\Response
     */
    public function show(Pair $pair)
    {
        //
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
    public function update(Request $request, Pair $pair)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required'
        ]);
        $post = Pair::find($pair->id);

        if ($pair) {
            $pair->update([
                'title' => $request->title,
                'content' => $request->content
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Post updated',
                'data' => $pair
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Pair not found'
        ], 404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pair  $pair
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pair $pair)
    {
        if ($pair) {
            $pair->delete();

            return response()->json([
                'success' => true,
                'message' => 'Pair deleted'
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Pair not found'
        ], 404);
    }
}
