<?php

namespace Tests\Unit;

use App\Http\Resources\TaskCollection;
use App\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Resources\TaskResource;
use Tymon\JWTAuth\JWTAuth;


class ApiTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */

    function test_get_all_json_data_status()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-type'=> 'application/json'
        ])->get('/api/task');

        $response->assertStatus(200);
    }

    function test_get_task_haw_id()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-type'=> 'application/json'
        ])->get('/api/task/13');

        $response->assertStatus(200);
    }

    function test_posted_tasks()
    {
        $data = [
            'title' => 'New title',
            'body' => 'New body'
        ];

        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-type'=> 'application/json'
        ])->json('POST', 'api/task', $data);

        $response->assertStatus(201);
    }

    function test_update_tasks()
    {
        $data = [
            'title' => 'New title',
            'body' => 'New body'
        ];

        $response = $this->withHeaders([
        'Accept' => 'application/json',
        'Content-type'=> 'application/json'
        ])->json('PUT', '/api/task/17', $data);

    $response->assertStatus(201);

}

    function test_destroy_tasks()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-type'=> 'application/json'
        ])->json('DELETE', '/api/task/17');

        $response->assertStatus(204);
    }
    /*Negative tests*/
    function test_if_task_model_not_found()
    {
        $error = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-type'=> 'application/json'
        ])->get('/api/taskknnkl');

        $error->assertStatus(404)->json([
            'error' => 'Task Model not found'
        ]);
    }

    function test_if_route_not_correct()
    {
        $error = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-type'=> 'application/json'
        ])->get('/api/task/jjhj1111111');

        $error->assertStatus(404)->json([
            'error' => 'Incorrect route'
        ]);
    }
}


