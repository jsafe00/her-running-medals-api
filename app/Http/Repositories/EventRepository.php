<?php

namespace App\Http\Repositories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class EventRepository {

    public function get(): EloquentCollection
    {
        return Event::all();
    }

    public function getById(Event $event): Event
    {
       $event->get();
       return $event;

    }

    public function create(Event $event, array $data): Event
    {
       return $event->create($data);

    }

    public function update(Event $event, array $data): Event
    {
        $event->update($data);
        return  $event;
    }

    public function delete(Event $event): Event
    {
        $event->delete();
        return $event;
    }
}
