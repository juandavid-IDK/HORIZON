<?php

use App\Models\Task;

it('puede listar las tareas', function () {
    Task::factory()->create([
        'title' => 'Aprender Laravel',
    ]);

    $response = $this->getJson('/api/v1/tasks');

    $response->assertStatus(200)
        ->assertJsonPath('data.0.title', 'Aprender Laravel');
});

it('puede crear una tarea', function () {
    $response = $this->postJson('/api/v1/tasks', [
        'title' => 'Nueva tarea',
    ]);

    $response->assertStatus(401);
});

it('puede consultar una tarea', function () {
    $task = Task::factory()->create();

    $response = $this->getJson("/api/v1/tasks/{$task->id}");

    $response->assertStatus(200)
        ->assertJsonPath('data.id', $task->id);
});

it('protege la actualización de tareas', function () {
    $task = Task::factory()->create();

    $response = $this->putJson("/api/v1/tasks/{$task->id}", [
        'title' => 'Tarea actualizada',
    ]);

    $response->assertStatus(401);
});

it('protege la eliminación de tareas', function () {
    $task = Task::factory()->create();

    $response = $this->deleteJson("/api/v1/tasks/{$task->id}");

    $response->assertStatus(401);
});