<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use Redirect;
use DataTables;
// use Illuminate\Support\Facades\Session;
use DB;
use Session;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        return view('Aluno.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Aluno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $aluno = new Aluno();
            $aluno->nome = $request->nome;
            $aluno->cpf = $request->cpf;
            $aluno->email = $request->email;
            $aluno->telefone = $request->telefone;
            $aluno->nascimento = $request->nascimento;
            
            DB::transaction(function() use ($aluno) {
                $aluno->save();
            });
            
            Session::flash('mensagem','Aluno Cadastrado!');
            return Redirect::to('/Aluno');
        }
        catch(\Exception $error){
            Session::flash('mensagem', 'Erro"');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aluno = Aluno::get();
            return Datatables::of($aluno)
            ->editColumn('nascimento', function ($aluno) {
                return date('d/m/Y', strtotime($aluno->nascimento));
            })
            ->editColumn('acao', function($aluno){
                return '
                    <div class="btn-group btn-group-sm">
                        <a href="/Aluno/'.$aluno->id.'/edit"
                            class="btn btn-info"
                            title="Editar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="#"
                            class="btn btn-danger btnExcluir"
                            data-id="'.$aluno->id.'"
                            title="Excluir" data-toggle="tooltip">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>';
            })
            ->escapeColumns([0])
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = Aluno::find($id);
        return view('Aluno.edit', compact('aluno'));
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
        try {
            $aluno = Aluno::find($id);
            $aluno->nome = $request->nome;
            $aluno->cpf = $request->cpf;
            $aluno->email = $request->email;
            $aluno->telefone = $request->telefone;
            $aluno->nascimento = $request->nascimento;
            $aluno->latitude = $request->latitude;
            $aluno->longitude = $request->longitude;

            DB::transaction(function() use ($aluno) {
                $aluno->save();
            });
            
            Session::flash('mensagem','Cadastro Alterado!');
            return Redirect::to('/Aluno');
        }
        catch(\Exception $error){
            Session::flash('mensagem', 'Erro"');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aluno = Aluno::find($id);
        $aluno->delete();
        
        return Redirect::to('/Aluno');
    }

    function listAlunos(Request $res){
        $aluno = Aluno::all("id", "nome");

        return $aluno;
    }
}
