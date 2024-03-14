<?php

namespace Services\Group;

use App\Models\Cryptocurrency;
use App\Models\Group as GroupModel;
use Services\Cryptocurrency\Cryptocurrency as CryptocurrencyService;
use App\Models\CryptocurrencyGroup as CryptocurrencyGroupModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class Group {
    public function __construct(
        private readonly GroupModel $model,
        private readonly CryptocurrencyService $criptoService
    ){}

    public function fetchAll(): Collection
    {
        return $this->model->with('cryptos')->get();
    }

    public function store(array $groupData): GroupModel
    {
        return $this->model->updateOrCreate(['name' => $groupData['name']], $groupData);
    }

    public function fetch(int $groupId)
    {
        return $this->model->with('cryptos')->find($groupId);
    }

    public function destroy(int $groupId)
    {
        return $this->model->find($groupId)->delete();
    }

    public function storeGroupCrypto(array $groupData)
    {
        $groupId = $groupData['groupId'];
        $cryptos = $groupData['cryptos'];
        DB::beginTransaction();
        // $cryptoGroupModel = new CryptocurrencyGroupModel();

        try {
            foreach($cryptos as $cryptocurrency) {
                $cryptoId = $this->criptoService->store($cryptocurrency);
                CryptocurrencyGroupModel::create([
                    'group_id' =>$groupId,
                    'cryptocurrency_id' =>$cryptocurrency
                ]);
            }

            DB::commit();
            return $this->fetch($groupId);
        } catch(\Exception $exception) {
            report($exception);
            DB::rollBack();
        }
    }
}