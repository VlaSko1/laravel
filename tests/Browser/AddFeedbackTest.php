<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddFeedbackTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/aggregator/feedback')
                ->assertSee('Введите своё имя')
                ->type('name', 'Антон')
                ->type('feedback', 'Произвольный отзыв о работе сайта')
                ->press('Отправить комментарий')
                ->assertPathIs('/aggregator/feedback');
        });
    }
}
