<?php

namespace App\Observers;

use App\Exceptions\StaleRecordException;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CommonColumnsObserver
{
    /**
     * Handle the common "creating" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function creating(Model $model)
    {
        $model->created_at = Carbon::now();
        $model->lock_version = 0;
    }

    /**
     * Handle the common "updating" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @throws \App\Exceptions\StaleRecordException
     * @return bool|void
     */
    public function updating(Model $model)
    {
        if (! $model->originalIsEquivalent('lock_version')) {
            throw new StaleRecordException($model);
        }
        if (! $model->isDirty()) {
            return;
        }
        
        $model->updated_at =  Carbon::now();
        $model->lock_version = $model->getOriginal('lock_version', 0) + 1;
    }

    /**
     * Handle the common "deleting" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @throws \App\Exceptions\StaleRecordException
     * @return bool|void
     */
    public function deleting(Model $model)
    {
        if (! $model->originalIsEquivalent('lock_version')) {
            throw new StaleRecordException($model);
        }

        $model->deleted_at = Carbon::now();
        $model->lock_version = $model->getOriginal('lock_version', 0) + 1;
    }

    /**
     * Handle the common "restoring" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function restoring(Model $model)
    {
        $model->deleted_at = null;
    }
}
