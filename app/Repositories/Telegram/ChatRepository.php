<?php

namespace App\Repositories\Telegram;

use App\Models\Chat;
use App\Repositories\Interfaces\ModelInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ChatRepository implements ModelInterface
{
    public function get(): Collection
    {
        return Chat::all();
    }

    public function find($id): Model|Collection|Builder|array|null
    {
        return Chat::query()->find($id);
    }

    public function create(array $data): Model|Builder
    {
        return Chat::query()->create($data);
    }

    public function update(array $data, $id): bool|int
    {
        return Chat::query()->find($id)->update($data);
    }

    public function delete($id): int
    {
        return Chat::destroy($id);
    }

    public function createOrUpdate(array $data, array $condition): Model|Builder
    {
        return Chat::query()->updateOrCreate($condition, $data);
    }
}
