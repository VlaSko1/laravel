<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\News;

class AddNewsListener
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
        if(isset($event->news) && $event->news instanceof News) {
            // Сделаем неправильно, то есть код изменения напишем прямо здесь, а не в модели
            $event->news->published = '0';
            $event->news->save();
        }
    }
}
