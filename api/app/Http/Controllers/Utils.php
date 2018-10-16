<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class Utils
{

    public function GetEstanteLivros($id=0) {
        $db = DB::table('estante_livro')
            ->select
            (
                'estante_livro.id',
                'estante_livro.prateleira',
                'estante_livro.id_livro',
                'livros.titulo as titulo_livro',
                'estante_livro.id_estante',
                'estantes.codigo as codigo_estante'
            )
            ->join('livros', 'estante_livro.id_livro', '=', 'livros.id')
            ->join('estantes', 'estante_livro.id_estante', '=', 'estantes.id');

        if ($id != 0) {
            $db = $db->where('estante_livro.id', $id);
        }

        return $db->get();
    }

    public function ReturnJson($obj, $message) {
        if (!$obj) {
            return $this->ReturnMessage($message, 400);
        }
        return response()->json($obj);

    }

    public function SaveObject($obj, $request) {
        $obj->fill($request->all());
        $obj->save();

        return response()->json($obj, 201);
    }

    public function UpdateObject($obj, $request, $message){
        if (!$obj) {
            return $this->ReturnMessage($message, 400);
        }
        return $this->SaveObject($obj, $request);
    }

    public function DestroyObject($obj, $message, $message_delete){
        if (!$obj) {
            return $this->ReturnMessage($message, 400);
        }
        $obj->delete();
        return $this->ReturnMessage($message_delete, 200);
    }

    public function ReturnMessage($message, $code) {
        return response()->json(['message' => $message], $code);
    }
}