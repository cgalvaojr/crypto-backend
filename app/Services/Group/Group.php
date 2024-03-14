<?php

namespace Services\Group;

use App\Models\Group as GroupModel;
use Illuminate\Database\Eloquent\Collection;

class Group {
    public function __construct(
        private readonly GroupModel $model
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
}