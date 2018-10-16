<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Livros;

class LivrosController extends Controller
{
    public function index()
    {
        return (new Utils())->ReturnJson(Livros::all(), 'Livros nao encontrados');
    }

    public function show($id)
    {
        return (new Utils())->ReturnJson(Livros::find($id), 'Livro nao encontrado');
    }

    public function store(Request $request)
    {
        return (new Utils())->SaveObject((new Livros()), $request);
    }

    public function update(Request $request, $id)
    {
        return (new Utils())->UpdateObject(Livros::find($id), $request, 'Livro nao encontrado');
    }

    public function destroy($id)
    {
        return (new Utils())->DestroyObject(Livros::find($id), 'Livro nao encontrado', 'Livro deletado');
    }
}
