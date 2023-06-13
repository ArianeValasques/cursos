<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CursosRequest;
use App\Http\Resources\CursosCollection;
use App\Http\Resources\CursosResource;
use App\Curso;
use App\Repository\CursosRepository;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CursosController extends Controller
{
	/**
	 * @var Curso
	 */

    private $curso;

	public function __construct(Curso $curso)
    {
	    $this->curso = $curso;
    }

    public function index(Request $request)
    {
    	$curso = $this->curso;
	    $CursosRepository = new CursosRepository($curso);

	    if($request->has('coditions')) {
		    $CursosRepository->selectCoditions($request->get('coditions'));
	    }

	    if($request->has('fields')) {
		    $CursosRepository->selectFilter($request->get('fields'));
	    }
 
	    return response()->json(new CursosCollection($CursosRepository->getResult()->paginate(30)));
			
    }

		public function indexXml(Request $request)
    {
    	$curso = $this->curso;
	    $CursosRepository = new CursosRepository($curso);

	    if($request->has('coditions')) {
		    $CursosRepository->selectCoditions($request->get('coditions'));
	    }

	    if($request->has('fields')) {
		    $CursosRepository->selectFilter($request->get('fields'));
	    }

	    return response()->xml(new CursosCollection($CursosRepository->getResult()->paginate(30)));
	
    }

		public function store(Request $request)
    {
				$curso = new Curso();
				$curso->nome = $request->nome;
				$curso->cargaHoraria = $request->cargaHoraria;
				$curso->save();
    }

		public function show($id)
		{
			$curso = $this->curso->find($id);

			return response()->json($curso);
		}

		public function showXml($id)
		{
			$curso = $this->curso->find($id);

			return response()->xml($curso);
		}

    public function save(Request $request)
    {
		
				$curso = new Curso();
				$curso->nome = $request->nome;
				$curso->cargaHoraria = $request->cargaHoraria;
				$curso->save();
				
    		//return response()->json($aluno);
				return response()->json(['data' => ['msg' => 'Curso cadastrado com sucesso!']]);
    
	}
		/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    		$curso = Curso::find($id);
				$curso->nome = $request->nome;
				$curso->cargaHoraria = $request->cargaHoraria;
				$curso->save();
				
    		return response()->json(['data' => ['msg' => 'Dados atualizados com sucesso!']]);
				//return response()->json($curso);
    }

    public function delete($id)
    {
    	$curso = $this->curso->find($id);
    	$curso->delete();

    	return response()->json(['data' => ['msg' => 'Curso foi removido com sucesso!']]);
    }
}
