<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddCategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/aggregator/categories/create')
                    ->assertSee('Введите название новой категории')
                    ->type('category', 'Произвольное название')
                    ->press('Создать категорию')
                    ->assertPathIs('/aggregator/categories');
        });
    }

}
