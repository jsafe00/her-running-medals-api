<?php

namespace App\Exceptions;

use Exception;
use Log;
use Illuminate\Database\Eloquent\Model;

class StaleRecordException extends Exception
{
    protected $record;

    public function __construct(Model $record)
    {
        parent::__construct(
            'The record is stale: '.$record->getTable().' #'.$record->getKey().'.'
        );
        $this->record = $record;
    }

    /**
     * Get the record
     * 
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getRecord()
    {
        return $this->record;
    }

    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        Log::debug($this->getMessage());
    }

    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function render($request)
    {
        return back()->with(
            'status', 'The data has been updated. Please check the latest data and try the process again.'
        );
    }
}
