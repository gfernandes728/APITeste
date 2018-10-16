<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\EstanteLivro;
use Illuminate\Support\Facades\DB;

class EstanteLivroController extends Controller
{
    public function index()
    {
        $utils = new Utils();
        return $utils->ReturnJson($utils->GetEstanteLivros(), 'Estante/Livro nao encontrado');
    }

    public function show($id)
    {
        $utils = new Utils();
        return $utils->ReturnJson($utils->GetEstanteLivros($id), 'Estante/Livro nao encontrado');
    }

    public function alocar(Request $request)
    {
        $utils = new Utils();

        foreach ($request['livros'] as $item) {
            $result = [
                'prateleira' => $request['prateleira'],
                'id_estante' => $request['id_estante'],
                'id_livro' => $item['id_livro'],
            ];

            $utils->SaveObject((new EstanteLivro()), $result);
        }

        return $utils->ReturnMessage('Livros Alocados', 200);
    }

    public function remover(Request $request)
    {
        $utils = new Utils();

        $x = 0;
        $livros = null;
        foreach ($request['livros'] as $item) {
            $livros[$x] = $item['id_livro'];
            ++$x;
        }

        DB::table('estante_livro')
            ->where('prateleira', $request['prateleira'])
            ->where('id_estante', $request['id_estante'])
            ->whereIn('id_livro', $livros)
            ->delete();

        return $utils->ReturnMessage('Livros Removidos', 200);
    }
}
