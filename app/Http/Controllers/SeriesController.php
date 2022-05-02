<?php

use App\Http\Controllers\Controller;
use App\Serie;

class SeriesController extends Controller
{
    public function index()
    {
        return Serie::all();
    }
}
