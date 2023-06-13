<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AlunosRequest;
use App\Http\Resources\AlunosCollection;
use App\Http\Resources\AlunosResource;
use App\Aluno;
use App\Repository\AlunosRepository;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlunosController extends Controller
{
	/**
	 * @var Aluno
	 */

    private $aluno;

	public function __construct(Aluno $aluno)
    {
	    $this->aluno = $aluno;
    }

    public function index(Request $request)
    {
    	$aluno = $this->aluno;
	    $AlunosRepository = new AlunosRepository($aluno);

	    if($request->has('coditions')) {
		    $AlunosRepository->selectCoditions($request->get('coditions'));
	    }

	    if($request->has('fields')) {
		    $AlunosRepository->selectFilter($request->get('fields'));
	    }

	    return response()->json(new AlunosCollection($AlunosRepository->getResult()->paginate(30)));
			
    }

		public function indexXml(Request $request)
    {
    	$aluno = $this->aluno;
	    $AlunosRepository = new AlunosRepository($aluno);

	    if($request->has('coditions')) {
		    $AlunosRepository->selectCoditions($request->get('coditions'));
	    }

	    if($request->has('fields')) {
		    $AlunosRepository->selectFilter($request->get('fields'));
	    }

	    return response()->xml(new AlunosCollection($AlunosRepository->getResult()->paginate(30)));
	
    }

		public function store(Request $request)
    {
				$aluno = new Aluno();
				$aluno->nome = $request->nome;
				$aluno->cpf = $request->cpf;
				$aluno->email = $request->email;
				$aluno->telefone = $request->telefone;
				$aluno->nascimento = $request->nascimento;
				$aluno->save();
    }

		public function show($id)
		{
			$aluno = $this->aluno->find($id);

			return response()->json($aluno);
		}

		public function showXml($id)
		{
			$aluno = $this->aluno->find($id);

			return response()->xml($aluno);
		}

    public function save(Request $request)
    {
		
				$aluno = new Aluno();
				$aluno->nome = $request->nome;
				$aluno->cpf = $request->cpf;
				$aluno->email = $request->email;
				$aluno->telefone = $request->telefone;
				$aluno->nascimento = $request->nascimento;
				$aluno->save();
				
    		//return response()->json($aluno);
				return response()->json(['data' => ['msg' => 'Aluno cadastrado com sucesso!']]);
    
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
    		$aluno = Aluno::find($id);
				$aluno->nome = $request->nome;
				$aluno->cpf = $request->cpf;
				$aluno->email = $request->email;
				$aluno->telefone = $request->telefone;
				$aluno->nascimento = $request->nascimento;
				$aluno->save();
				
    		return response()->json(['data' => ['msg' => 'Dados atualizados com sucesso!']]);
				//return response()->json($aluno);
    }

    public function delete($id)
    {
    	$aluno = $this->aluno->find($id);
    	$aluno->delete();

    	return response()->json(['data' => ['msg' => 'Aluno foi removido com sucesso!']]);
    }
}
