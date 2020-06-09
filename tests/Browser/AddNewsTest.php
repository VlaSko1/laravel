<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/aggregator/news/create')
                ->assertSee('Введите название новости')
                ->type('name', 'Произвольное название')
                ->type('briefly', 'Произвольное краткое описание новости')
                ->type('detail', 'Произвольный полный текст новости,
                        который удовлятворяет требованиям формы.')
                ->type('published', '1')
                ->type('category_id', '1')
                ->press('Отправить новость')
                ->assertPathIs('/aggregator/news/create');
        });
    }
}
