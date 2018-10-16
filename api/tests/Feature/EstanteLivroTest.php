<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EstanteLivroTest extends TestCase
{
    public function testAlocar()
    {
        $livros[0] = ['id_livro' => 1];
        $livros[1] = ['id_livro' => 2];

        $this->json('POST', 'api/estante_livro/alocar',
            ['prateleira' => 1, 'id_estante' => 1, 'livros' => $livros])
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'prateleira',
                'id_livro',
                'titulo_livro',
                'id_estante',
                'codigo_estante',
            ]);
    }

    public function testRemover()
    {
        $livros[0] = ['id_livro' => 1];
        $livros[1] = ['id_livro' => 2];

        $this->json('POST', 'api/estante_livro/remover',
            ['prateleira' => 1, 'id_estante' => 1, 'livros' => $livros])
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'prateleira',
                'id_livro',
                'titulo_livro',
                'id_estante',
                'codigo_estante',
            ]);
    }
}
