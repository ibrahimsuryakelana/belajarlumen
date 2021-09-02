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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function () {
    return \Illuminate\Support\Str::random(32);
});

$router->get('/foo', function () {
    return 'Method GET';
});

$router->post('/pos', function () {
    return 'Method POST';
});

$router->put('/put-method' ,function() {
    return "Method PUT";
});

$router->patch('/patch-method', function (){
    return "Method PATCH";
});

$router->delete('/delete-method' , function (){
    return "Method Delete!";
});


//Basic Route parameter
$router->get('/user/{id}', function ($id){
    return 'User is = ' . $id;
});

$router->get('/post/{postId}/comments/{commentId}', function ($postId, $commentId) {
    return 'Post Id =' . $postId  . ',Comment Id = ' .$commentId; 
});

//optional Route Parameter
$router->get('/optional[/{param}]' , function ($param = null) {
    return $param;
});

//Group Prefix
$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->get('home', function () {
        return 'Home Admin';
    });

    $router->get('profile', function () {
        return 'Profile Admin';
    });
});

$router->get('hero/admin', ['as' => 'route.hero', function () {
    return route('route.hero');
}]);

$router->get('/admin/home', ['middleware' => 'age', function() {
    return 'Old Enough / Berhasil';
}]);

$router->get('/fails', function () {
    return 'Not Yet mature / Gagal';
});

$router->get('/heros/{id}', 'ExampleController@getHero');
