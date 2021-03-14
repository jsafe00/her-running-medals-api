<?php

namespace App\Http\Repositories;

use App\Models\Medal;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class MedalRepository {

    public function get(): EloquentCollection
    {
        return Medal::query()->with('event')->get();
    }

    public function getById(Medal $medal): Medal
    {
        $medal->get();
        return $medal;
    }

    public function create(Medal $medal, array $data): Medal
    {
        return $medal->create($data);

    }

    public function update(Medal $medal, array $data): Medal
    {
        $medal->update($data);
        return  $medal;
    }

    public function delete(Medal $medal): Medal
    {
        $medal->delete();
        return $medal;
    }
}
