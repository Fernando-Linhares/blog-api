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
$router->group(['prefix'=>'/blog_tail', 'middleware'=>'auth'], function()use($router){
    $router->get('/', "ResourceController@index");
    $router->get('/{id}/select',"ResourceController@select");
    $router->delete('/{id}/delete',"ResourceController@destroy");
    $router->post('/create',"ResourceController@create");
    $router->patch('/{id}/update/title',"ResourceController@updateTitle");
    $router->patch('/{id}/update/text',"ResourceController@updateContent");
    $router->patch('/{id}/update/image',"ResourceController@updateImage");
    $router->put('/{id}/update',"ResourceResourceController@update");
    $router->get('/comments',"CommentsController@comments");
    $router->post('/comments/send', "CommentsController@sendComments");
    $router->get('/get-key',"AuthController@me");    
});
$router->post('login', "AuthController@login");
$router->post('register', "AuthController@register");
