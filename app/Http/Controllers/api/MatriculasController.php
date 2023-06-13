<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\MatriculasRequest;
use App\Http\Resources\MatriculasCollection;
use App\Http\Resources\MatriculasResource;
use App\Matricula;
use App\Repository\MatriculasRepository;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatriculasController extends Controller
{
	/**
	 * @var Matricula
	 */

    private $matricula;

	public function __construct(Matricula $matricula)
    {
	    $this->matricula = $matricula;
    }

    public function index(Request $request)
    {
    	$matricula = $this->matricula;
	    $MatriculasRepository = new MatriculasRepository($matricula);

	    if($request->has('coditions')) {
		    $MatriculasRepository->selectCoditions($request->get('coditions'));
	    }

	    if($request->has('fields')) {
		    $MatriculasRepository->selectFilter($request->get('fields'));
	    }

	    return response()->json(new MatriculasCollection($MatriculasRepository->getResult()->paginate(30)));
			
    }

		public function indexXml(Request $request)
    {
    	$matricula = $this->matricula;
	    $MatriculasRepository = new MatriculasRepository($matricula);

	    if($request->has('coditions')) {
		    $MatriculasRepository->selectCoditions($request->get('coditions'));
	    }

	    if($request->has('fields')) {
		    $MatriculasRepository->selectFilter($request->get('fields'));
	    }

	    return response()->xml(new MatriculasCollection($MatriculasRepository->getResult()->paginate(30)));
	
    }

		public function store(Request $request)
    {
				$matricula = new Matricula();
				$matricula->fk_aluno = $request->fk_aluno;
				$matricula->fk_curso = $request->fk_curso;
				$matricula->save();
    }

		public function show($id)
		{
			$matricula = $this->matricula->find($id);

			return response()->json($matricula);
		}

		public function showXml($id)
		{
			$matricula = $this->matricula->find($id);

			return response()->xml($matricula);
		}

    public function save(Request $request)
    {
		
				$matricula = new Matricula();
				$matricula->fk_aluno = $request->fk_aluno;
				$matricula->fk_curso = $request->fk_curso;
				$matricula->save();
				
    		//return response()->json($aluno);
				return response()->json(['data' => ['msg' => 'Matricula efetuada com sucesso!']]);
    
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
    		$matricula = Matricula::find($id);
				$matricula->fk_aluno = $request->fk_aluno;
				$matricula->fk_curso = $request->fk_curso;
				$matricula->save();
				
    		return response()->json(['data' => ['msg' => 'Dados atualizados com sucesso!']]);
				//return response()->json($matricula);
    }

    public function delete($id)
    {
    	$matricula = $this->matricula->find($id);
    	$matricula->delete();

    	return response()->json(['data' => ['msg' => 'Matricula foi removida com sucesso!']]);
    }
}
