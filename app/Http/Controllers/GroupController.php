<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupCryptoRequest;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Group as GroupModel;
use Services\Group\Group as GroupService;

class GroupController extends Controller
{
    public function __construct(private readonly GroupService $service)
    {
        
    }

    public function index()
    {
        return $this->service->fetchAll(); 
    }

    public function store(StoreGroupRequest $request)
    {
        return response()->json($this->service->store($request->validated()));
    }

    public function show(int $groupId)
    {
        return response()->json($this->service->fetch($groupId));
    }

    public function destroy(int $groupId)
    {
        return response()->json($this->service->destroy($groupId));
    }

    public function storeGroupCrypto(StoreGroupCryptoRequest $request)
    {
        return response()->json($this->service->storeGroupCrypto($request->validated()));
    }
}
