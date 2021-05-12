<?php

namespace App\Listeners;

use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Database\Events\TransactionCommitted;
use Illuminate\Database\Events\TransactionRolledBack;
use Illuminate\Support\Facades\Log;

class DatabaseEventSubscriber
{
    /**
     * Handle the QueryExecuted event.
     *
     * @param  \Illuminate\Database\Events\QueryExecuted  $event
     * @return void
     */
    public function handleQueryExecuted(QueryExecuted $event)
    {
        Log::debug($event->sql, ['bindings' => $event->bindings, 'ms' => $event->time]);
    }

    /**
     * Handle the TransactionBeginning event.
     *
     * @param  \Illuminate\Database\Events\TransactionBeginning  $event
     * @return void
     */
    public function handleTransactionBeginning(TransactionBeginning $event)
    {
        Log::debug('begin');
    }

    /**
     * Handle the TransactionCommitted event.
     *
     * @param  \Illuminate\Database\Events\TransactionCommitted  $event
     * @return void
     */
    public function handleTransactionCommitted(TransactionCommitted $event)
    {
        Log::debug('commit');
    }

    /**
     * Handle the TransactionRolledBack event.
     *
     * @param  \Illuminate\Database\Events\TransactionRolledBack  $event
     * @return void
     */
    public function handleTransactionRollback(TransactionRolledBack $event)
    {
        Log::debug('rollback');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return void
     */
    public function subscribe($events)
    {
        foreach ([
            QueryExecuted::class,
            TransactionBeginning::class,
            TransactionCommitted::class,
            TransactionRolledBack::class,
        ] as $className) {
            $events->listen($className, [__CLASS__, 'handle'.class_basename($className)]);
        }
    }
}
