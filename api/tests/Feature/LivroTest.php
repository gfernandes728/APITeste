<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LivroTest extends TestCase
{
    public function testStore()
    {
        $this->json('POST', 'api/livros', ['titulo' => 'TESTE 33'])
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'titulo',
                'created_at',
                'updated_at',
            ]);
    }

    public function testUpdate()
    {
        $this->json('PUT', 'api/livros/1', ['titulo' => 'TESTE 44'])
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'titulo',
                'created_at',
                'updated_at',
            ]);
    }

    public function testDelete()
    {
        $this->json('DELETE', 'api/livros/1')
            ->assertStatus(200)
            ->assertJsonStructure(['message' => 'Deletado']);
    }
}
