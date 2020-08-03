<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAllCategories()
    {
        $response = $this->get('api/category');
        $response->assertStatus(200);
        $categories = collect(json_decode($response->getContent())[0]->data);
        $this->assertCount(4, $categories);
        $this->assertEquals($categories[0]->name, 'noshidani');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetByCategoryId()
    {
        $response = $this->get('api/category/3');
        $response->assertStatus(200);
        $category = json_decode($response->getContent())[0];
        $this->assertEquals($category->name, 'labaniat');
        $this->assertEquals($category->products[0]->name, 'shir');
        $this->assertCount(2, $category->products);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:refresh');
        $this->artisan('db:seed');
    }
}
