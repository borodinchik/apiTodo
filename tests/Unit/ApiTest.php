<?php

namespace Tests\Unit;

use App\Http\Resources\TaskCollection;
use App\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Resources\TaskResource;


class ApiTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function test_get_all_json_data_status()
    {
        $this->get('/api/task')->assertStatus(200);

    }

    public function test_get_task_haw_id()
    {
        $this->get('/api/task/1')->assertStatus(200);
    }



}


