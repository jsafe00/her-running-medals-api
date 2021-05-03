<?php

namespace App\Models\Concerns;

use App\Observers\CommonColumnsObserver;
use Illuminate\Database\Eloquent\SoftDeletes;

trait HasCommonColumns
{
    use SoftDeletes;

    /**
     * Boot the common columns trait for a model.
     *
     * @return void
     */
    public static function bootHasCommonColumns()
    {
        static::observe(CommonColumnsObserver::class);
    }

    /**
     * Initialize the common columns trait for an instance.
     *
     * @return void
     */
    public function initializeHasCommonColumns()
    {
        if (! isset($this->casts['lock_version'])) {
            $this->casts['lock_version'] = 'integer';
        }
        if (! in_array('lock_version', $this->fillable)) {
            $this->fillable[] = 'lock_version';
        }
    }

    /**
     * Perform the actual delete query on this model instance.
     *
     * @return void
     */
    protected function runSoftDelete()
    {
        $query = $this->setKeysForSaveQuery($this->newModelQuery());

        $time = $this->freshTimestamp();

        $columns = $this->getDirty();

        $columns["deleted_at"] = $this->fromDateTime($time);
        $this->deleted_at = $time;

        $columns["updated_at"] = $this->fromDateTime($time);
        $this->updated_at = $time;

        $query->update($columns);

        $this->syncOriginalAttributes(array_keys($columns));
    }
}
