<?php
namespace Tests\Feature;
use Tests\TestCase;

class HealtRouteTest extends TestCase{

    public function test_healt_route_status_code(){

        $response = $this->get('/health');

        $response->assertStatus(404);

    }

}