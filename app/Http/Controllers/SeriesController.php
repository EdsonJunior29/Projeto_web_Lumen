<?php

namespace App\Http\Controllers;

use App\Serie;

class SeriesController extends Controller
{
    public function index()
    {
        return Serie::all();
    }
}
