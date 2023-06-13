<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/test', function(){
//    $response = new \Illuminate\Http\Response(json_encode(['msg' => 'Minha resposta de API']));
//	$response->header('Content-Type', 'application/json');

//	return $response;
//});

Route::namespace('Api')->group(function(){
		//Rota Alunos
	  Route::prefix('alunos')->group(function(){
			Route::get('/', 'AlunosController@index');
			Route::get('/{id}', 'AlunosController@show');
			Route::post('/', 'AlunosController@save');//->middleware('auth.basic');
			Route::put('/{id}', 'AlunosController@update');
			Route::patch('/', 'AlunosController@update');
			Route::delete('/{id}', 'AlunosController@delete');
		});
		Route::prefix('aluno')->group(function(){
			Route::get('/', 'AlunosController@indexXml');
			Route::get('/{id}', 'AlunosController@showXml');
		});
    //Rota Matricula
    Route::prefix('matriculas')->group(function(){
			Route::get('/', 'MatriculasController@index');
			Route::get('/{id}', 'MatriculasController@show');
			Route::post('/', 'MatriculasController@save');//->middleware('auth.basic');
			Route::put('/{id}', 'MatriculasController@update');
			Route::patch('/', 'MatriculasController@update');
			Route::delete('/{id}', 'MatriculasController@delete');
		});
		Route::prefix('matricula')->group(function(){
			Route::get('/', 'MatriculasController@indexXml');
			Route::get('/{id}', 'MatriculasController@showXml');
		});
    //Rota Cursos
    Route::prefix('cursos')->group(function(){
			Route::get('/', 'CursosController@index');
			Route::get('/{id}', 'CursosController@show');
			Route::post('/', 'CursosController@save');//->middleware('auth.basic');
			Route::put('/{id}', 'CursosController@update');
			//Route::patch('/', 'CursosController@update');
			Route::delete('/{id}', 'CursosController@delete');
		});
		Route::prefix('curso')->group(function(){
			Route::get('/', 'CursosController@indexXml');
			Route::get('/{id}', 'CursosController@showXml');
		});
		Route::resource('/users', 'UserController');
 
	});