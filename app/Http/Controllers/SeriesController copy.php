<?php

namespace App\Http\Controllers;

use App\Episodio;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function index()
    {
        return Episodio::all();
    }

    public function store(Request $request)
    {
        return response()->json(Episodio::create([
            'nome' => $request->nome
        ]), 201);
    }

    public function show(int $id)
    {
        $serie = Episodio::find($id);
        if (is_null($serie)) {
            return response()->json('', 204);
        }
        return response()->json($serie);
    }

    public function update(int $id, Request $request)
    {
        $serie = Episodio::find($id);
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
        $qtdRecursoRemovido = Episodio::destroy($id);
        if ($qtdRecursoRemovido === 0) {
            return response()->json(['erro' => 'Recurso não encontrado'], 404);
        }

        return response()->json('', 204);
    }
}
