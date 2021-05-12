<?php

namespace App\Http\Controllers;

use App\Http\Repositories\EventRepository;
use App\Http\Requests\Events\CreateUpdateEventFormRequest;
use App\Http\Resources\EventResource;
use App\Events\EventCreated;
use App\Models\Event;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EventController extends Controller
{
    /**
     * EventController Constructor
     *
     * @param EventRepository $eventRepository
     *
     */
    public function __construct(
        protected EventRepository $eventRepository
    ) { }

    /**
     * Display a listing of the resource.
     *
     * @param Event $event
     * @return AnonymousResourceCollection
     */
    public function list(Event $event): AnonymousResourceCollection
    {
        $events = $this->eventRepository->get($event);

        return EventResource::collection($events);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUpdateEventFormRequest $request
     * @return EventResource
     */
    public function create(CreateUpdateEventFormRequest $request, Event $event): EventResource
    {
        $event = $this->eventRepository->create($event,$request->validated());
        event(new EventCreated($event));

        return new EventResource($event);
    }

    /**
     * Display the specified resource.
     *
     * @param Event $event
     * @return EventResource
     */
    public function show(Event $event): EventResource
    {
        $event = $this->eventRepository->getById($event);

        return new EventResource($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateUpdateEventFormRequest $request
     * @param Event $event
     * @return EventResource
     */
    public function update(CreateUpdateEventFormRequest $request, Event $event): EventResource
    {
        $event = $this->eventRepository->update($event, $request->validated());

        return new EventResource($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Event $event
     * @return EventResource
     */
    public function destroy(Event $event): EventResource
    {
        $event = $this->eventRepository->delete($event);

        return new EventResource($event);
    }
}
