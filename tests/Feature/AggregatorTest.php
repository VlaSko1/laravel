<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AggregatorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/aggregator/index.html');
        $response->assertDontSeeText('тырнет');
        $response->assertSeeText('агрегатор');

        $response->assertStatus(200);
    }
    public function testCategories()
    {
        $response = $this->get('/aggregator/categories.html');
        $response->assertDontSeeText('тырнет');
        $response->assertSeeText('Наука');
        $response->assertDontSee('наука');

        $response->assertStatus(200);
    }
    public function testCategory()
    {
        $response = $this->get('/aggregator/category/4.html');
        $response->assertViewIs('aggregator.category');

        $response->assertStatus(200);
    }
    public function testAuth()
    {
        $response = $this->get('/aggregator/auth.html');

        $response->assertDontSeeText('авторизация');
        $response->assertOk();
    }
    public function testAuthPost()
    {
        $response = $this->post('/aggregator/auth.html');

        $response->assertStatus(419);
    }
    public function testAdmin()
    {
        $response = $this->get('/aggregator/admin/add_news.html');

        $response->assertStatus(200);
    }
    public function testAdminPost()
    {
        $response = $this->post('/aggregator/admin/add_news.html');

        $response->assertStatus(419);
    }

    public function testFeedback()
    {
        $response = $this->get('/aggregator/feedback.html');
        $response->assertSessionHasNoErrors();
        $response->assertSuccessful();
    }
    public function testFeedbackPost()
    {
        $response = $this->post('/aggregator/feedback.html');
        $response->assertStatus(419);
    }
    public function testOrder()
    {
        $response = $this->get('/aggregator/order_data.html');

        $response->assertStatus(200);
    }

}
