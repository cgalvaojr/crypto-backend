<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCryptocurrencyRequest;
use App\Http\Requests\UpdateCryptocurrencyRequest;
use Illuminate\Http\Request;
use Services\Cryptocurrency\Cryptocurrency as CryptocurrencyService;

class CryptocurrencyController extends Controller
{
    public function __construct(private readonly CryptocurrencyService $cryptocurrencyService)
    {}
    
    public function index(Request $request)
    {
        return response()->json($this->cryptocurrencyService->fetchAll($request->all()));
    }

    public function store(StoreCryptocurrencyRequest $request)
    {
        return response()->json($this->cryptocurrencyService->store($request->validated()));
    }

    public function show(string $cryptocurrencyId)
    {
        return response()->json($this->cryptocurrencyService->fetch($cryptocurrencyId));
    }
}
