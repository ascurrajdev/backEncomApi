<?php

namespace Tests\Feature\API;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function can_store_a_task(): void
    {
        Task::factory()->create();
        $response = $this->getJson(route('api.task.index'));
        $response->assertSuccessful();
    }
}
