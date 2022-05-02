<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        return Serie::all();
    }

    public function store(Request $request)
    {
        return response()->json(Serie::create([
            'nome' => $request->nome
        ]), 201);
    }

    public function findById(int $id)
    {
        $serie = Serie::find($id);
        if (is_null($serie)) {
            return response()->json('', 404);
        }
        return response()->json($serie);
    }
}
