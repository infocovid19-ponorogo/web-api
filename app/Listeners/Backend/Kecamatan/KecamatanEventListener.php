<?php

namespace App\Listeners\Backend\Kecamatan;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class KecamatanEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }

    public function onUpdated($event)
    {
        
        \Log::info('Kecamatan '.$event->kecamatan->name.' Updated');
    }

    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Kecamatan\KecamatanUpdated::class,
            'App\Listeners\Backend\Kecamatan\KecamatanEventListener@onUpdated'
        );
    }
}
