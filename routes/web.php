<?php


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


use App\Http\Controllers\PostController; // not in course or in example ?? 
use Illuminate\Support\Facades\DB;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->options(
    '/{any:.*}',
    [
        'middleware' => ['cors'],
        function () {
            return response(['status' => 'success']);
        }
    ]
);
$router->group(['middleware' => 'cors'], function ($router) {
    $router->get('/posts', "PostController@index");
    $router->post('/posts', "PostController@store");
    $router->put('/posts/{id}', "PostController@update");
    $router->delete('/posts/{id}', "PostController@destroy");
});

// $router->group(['prefix' => 'api'], function() use ($router) {
//     $router->get('/posts', "PostController@index");
//     $router->get('/posts', [ProductController::class, 'index']);
// });
