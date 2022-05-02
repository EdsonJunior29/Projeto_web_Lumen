<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    protected $classe;

    public function index()
    {
        return $this->classe::all();
    }

    public function store(Request $request)
    {
        return response()->json($this->classe::create([
            'nome' => $request->nome
        ]), 201);
    }

    public function show(int $id)
    {
        $serie = $this->classe::find($id);
        if (is_null($serie)) {
            return response()->json('', 204);
        }
        return response()->json($serie);
    }

    public function update(int $id, Request $request)
    {
        $serie = $this->classe::find($id);
        if (is_null($serie)) {
            return response()->json([
                'erro' => 'Recurso não encontrado'
            ], 404);
        }

        $serie->fill($request->all());
        $serie->save();
        return $serie;
    }

    public function destroy(int $id)
    {
        $qtdRecursoRemovido = $this->classe::destroy($id);
        if ($qtdRecursoRemovido === 0) {
            return response()->json(['erro' => 'Recurso não encontrado'], 404);
        }

        return response()->json('', 204);
    }
}
