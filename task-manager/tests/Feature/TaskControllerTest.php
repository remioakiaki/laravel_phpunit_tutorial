<?php

namespace Tests\Feature;

use App\Task;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;
    private $task;

    protected function setUp()
    {
        parent::setUp();
        $this->task = Task::create([
            'title' => 'テストタスク',
            'executed' => false,
        ]);
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/tasks');

        $response->assertStatus(200);
    }
    /**
     * Get Task Detail Path Test
     *
     * @return void
     */
    public function testGetTaskPath()
    {
        $response = $this->get('/tasks/' . $this->task->id);

        $response->assertStatus(200);
    }
    /**
     * Get Task Detail Path Not Exists Test
     *
     * @return void
     */
    public function testGetTaskPathNotExists()
    {
        $response = $this->get('/tasks/0');

        $response->assertStatus(404);
    }
    /**
     * Put Task Detail Path Test
     *
     * @return void
     */
    public function testPutTaskPath()
    {
        $data = [
            'title' => 'test title',
        ];
        $this->assertDatabaseMissing('tasks', $data);

        $response = $this->put('/tasks/' . $this->task->id, $data);

        $response->assertStatus(302)
            ->assertRedirect('/tasks/' . $this->task->id);

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testPutTaskPath2()
    {
        $data = [
            'title' => 'テストタスク2',
            'executed' => true,
        ];
        $this->assertDatabaseMissing('tasks', $data);

        $response = $this->put('/tasks/' . $this->task->id, $data);

        $response->assertStatus(302)
            ->assertRedirect('/tasks/' . $this->task->id);

        $this->assertDatabaseHas('tasks', $data);
    }
}
