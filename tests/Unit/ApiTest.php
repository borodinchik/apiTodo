<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;



class ApiTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */

    function test_get_all_json_data_status()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->withHeaders([
            'Accept' => 'application/json',
            'Content-type'=> 'application/json'
        ])->get('/api/task');

        $response->assertStatus(200);
    }

    function test_get_task_haw_id()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->withHeaders([
            'Accept' => 'application/json',
            'Content-type'=> 'application/json'
        ])->get('/api/task/' . $user->id);

        $response->assertStatus(200);
    }

    function test_posted_tasks()
    {
        $user = factory(User::class)->create();

        $data = [
            'title' => 'New title',
            'body' => 'New body'
        ];

        $response = $this->actingAs($user)
            ->withHeaders([
            'Accept' => 'application/json',
            'Content-type'=> 'application/json'
        ])->json('POST', 'api/task', $data);

        $response->assertStatus(201);
    }

    function test_update_tasks()
    {
        $user = factory(User::class)->create();

        $data = [
            'title' => 'New title',
            'body' => 'New body'
        ];

        $response = $this->actingAs($user)
            ->withHeaders([
        'Accept' => 'application/json',
        'Content-type'=> 'application/json'
        ])->json('PUT', '/api/task/' . $user->id, $data);

        $response->assertStatus(201);

}

    function test_destroy_tasks()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->withHeaders([
            'Accept' => 'application/json',
            'Content-type'=> 'application/json'
        ])->json('DELETE', '/api/task/' . $user->id);

        $response->assertStatus(204);
    }
    /*Negative tests*/
    function test_if_task_model_not_found()
    {
        $user = factory(User::class)->create();

        $error = $this->actingAs($user)
            ->withHeaders([
            'Accept' => 'application/json',
            'Content-type'=> 'application/json'
        ])->get('/api/taskknnkl');

        $error->assertStatus(404)->json([
            'error' => 'Task Model not found'
        ]);
    }

    function test_if_route_not_correct()
    {
        $user = factory(User::class)->create();

        $error = $this->actingAs($user)
            ->withHeaders([
            'Accept' => 'application/json',
            'Content-type'=> 'application/json'
        ])->get('/api/task/jjhj1111111');

        $error->assertStatus(404)->json([
            'error' => 'Incorrect route'
        ]);
    }
}


