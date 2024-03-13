<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCryptocurrencyRequest;
use App\Http\Requests\UpdateCryptocurrencyRequest;
use App\Models\Cryptocurrency;

class CryptocurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([ 1 => 'funcionando a parada' ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCryptocurrencyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cryptocurrency $cryptocurrency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCryptocurrencyRequest $request, Cryptocurrency $cryptocurrency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cryptocurrency $cryptocurrency)
    {
        //
    }
}
