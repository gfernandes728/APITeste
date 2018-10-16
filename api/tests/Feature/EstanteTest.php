<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EstanteTest extends TestCase
{
    public function testStore()
    {
        $this->json('POST', 'api/estantes', ['codigo' => '717'])
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'codigo',
                'created_at',
                'updated_at',
            ]);
    }

    public function testUpdate()
    {
        $this->json('PUT', 'api/estantes/1', ['codigo' => '999'])
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'codigo',
                'created_at',
                'updated_at',
            ]);
    }

    public function testDelete()
    {
        $this->json('DELETE', 'api/estantes/1')
            ->assertStatus(200)
            ->assertJsonStructure(['message' => 'Deletado']);
    }
}
