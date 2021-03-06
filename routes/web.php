<?php

/** @var \Laravel\Lumen\Routing\Router $router */


$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'api'], function ()  use ($router) {
    $router->get('series', 'SeriesController@index');
    $router->post('series', 'SeriesController@store');
    $router->get('series/{id}', 'SeriesController@show');
    $router->put('series/{id}', 'SeriesController@update');
    $router->delete('series/{id}', 'SeriesController@destroy');
});

$router->group(['prefix' => 'api'], function ()  use ($router) {
    $router->get('episodios', 'EpisodiosController@index');
    $router->post('episodios', 'EpisodiosController@store');
    $router->get('episodios/{id}', 'EpisodiosController@show');
    $router->put('episodios/{id}', 'EpisodiosController@update');
    $router->delete('episodios/{id}', 'EpisodiosController@destroy');
});
