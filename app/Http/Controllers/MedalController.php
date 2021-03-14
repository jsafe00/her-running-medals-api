<?php

namespace App\Http\Controllers;

use App\Http\Repositories\MedalRepository;
use App\Http\Requests\Medals\CreateUpdateMedalFormRequest;
use App\Http\Resources\MedalResource;
use App\Models\Medal;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MedalController extends Controller
{
    /**
     * MedalController Constructor
     *
     * @param MedalRepository $medalRepository
     *
     */
    public function __construct(
        protected MedalRepository $medalRepository
    ) { }

    /**
     * Display a listing of the resource.
     *
     * @param Medal $medal
     * @return AnonymousResourceCollection
     */
    public function list(Medal $medal): AnonymousResourceCollection
    {
        $medals = $this->medalRepository->get($medal);

        return MedalResource::collection($medals);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUpdateMedalFormRequest $request
     * @param Medal $medal
     * @return MedalResource
     */
    public function create(CreateUpdateMedalFormRequest $request, Medal $medal): MedalResource
    {
        $medal = $this->medalRepository->create($medal,$request->validated());

        return new MedalResource($medal);
    }

    /**
     * Display the specified resource.
     *
     * @param Medal $medal
     * @return MedalResource
     */
    public function show(Medal $medal): MedalResource
    {
        $medal = $this->medalRepository->getById($medal);

        return new MedalResource($medal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateUpdateMedalFormRequest $request
     * @param Medal $medal
     * @return MedalResource
     */
    public function update(CreateUpdateMedalFormRequest $request, Medal $medal): MedalResource
    {
        $medal = $this->medalRepository->update($medal, $request->validated());

        return new MedalResource($medal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Medal $medal
     * @return MedalResource
     */
    public function destroy(Medal $medal): MedalResource
    {
        $medal = $this->medalRepository->delete($medal);

        return new MedalResource($medal);
    }
}
