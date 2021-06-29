<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApplicationResourceTest extends TestCase
{
    /**
     * @test
     */
    public function visite_index_project_status_must_be_ok(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function visite_create_form_status_must_be_ok(): void
    {
        $response = $this->get('/create');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function update_data_must_redirect_page(): void
    {
        $response = $this->post('/',[
            'name'=>'Jaqueta',
            'price'=>142.99,
            'category_id'=>2
        ]);
        $response->assertRedirect('/');
    }

    /**
     * @test
     */
    public function render_only_one_product(): void
    {
        $response = $this->get('/2');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function must_show_product_on_form_to_update(): void
    {
        $response = $this->get('/2/edit');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function must_send_data_to_update(): void
    {
        $response = $this->put('/2',[
            'name'=>'dress',
            'price'=>1290.212,
            'category_id'=>1
        ]);
        $response->assertRedirect('/');
    }

    /**
     * @test
     */
    public function must_delete_data_by_id(): void
    {
        $response = $this->delete('/13');
        $response->assertRedirect('/');
    }
}
