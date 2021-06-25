<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->group(['prefix'=>'/blog_tail'],function()use($router){
    $router->get('/', "Controller@index");
    $router->get('/{id}/select',"Controller@select");
    $router->delete('/{id}/delete',"Controller@destroy");
    $router->post('/create',"Controller@create");
    $router->patch('/{id}/update/title',"Controller@updateTitle");
    $router->patch('/{id}/update/text',"Controller@updateContent");
    $router->patch('/{id}/update/image',"Controller@updateImage");
    $router->put('/{id}/update',"Controller@update");
});
$router->get('/comments',"CommentsController@comments");
$router->post('/comments/send', "CommentsController@sendComments");
