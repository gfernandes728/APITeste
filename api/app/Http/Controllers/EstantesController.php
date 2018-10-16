<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Estantes;

class EstantesController extends Controller
{
    public function index()
    {
        return (new Utils())->ReturnJson(Estantes::all(), 'Estantes nao encontradas');
    }

    public function show($id)
    {
        return (new Utils())->ReturnJson(Estantes::find($id), 'Estante nao encontrada');
    }

    public function store(Request $request)
    {
        return (new Utils())->SaveObject((new Estantes()), $request);
    }

    public function update(Request $request, $id)
    {
        return (new Utils())->UpdateObject(Estantes::find($id), $request, 'Estante nao encontrada');
    }

    public function destroy($id)
    {
        return (new Utils())->DestroyObject(Estantes::find($id), 'Estante nao encontrada', 'Estante deletada');
    }
}
