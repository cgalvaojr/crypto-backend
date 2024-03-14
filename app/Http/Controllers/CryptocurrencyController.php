<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCryptocurrencyRequest;
use App\Http\Requests\UpdateCryptocurrencyRequest;
use Services\Cryptocurrency\Cryptocurrency as CryptocurrencyService;

class CryptocurrencyController extends Controller
{
    public function __construct(private readonly CryptocurrencyService $cryptocurrencyService)
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index(?string $sort = 'name', ?string $sortOrder = 'asc')
    {
        return response()->json($this->cryptocurrencyService->fetchAll($sort, $sortOrder));
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
