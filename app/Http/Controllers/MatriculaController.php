<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matricula;
use App\Aluno;
use App\Curso;
use Redirect;
use DataTables;
// use Illuminate\Support\Facades\Session;
use DB;
use Session;


class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Matricula.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alunos = Aluno::select('id','nome')->orderBy('nome')->get();
        $cursos = Curso::select('id','nome')->orderBy('nome')->get();

        return view('Matricula.create', compact('alunos','cursos'));
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
            $matricula = new Matricula();
            $matricula->fk_aluno = $request->fk_aluno;
            $matricula->fk_curso = $request->fk_curso;
            
            DB::transaction(function() use ($matricula) {
                $matricula->save();
            });
            
            Session::flash('mensagem','Matricula Efetuada!');
            return Redirect::to('/Matricula');
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
        $matricula = Matricula::get();
            return Datatables::of($matricula)
            ->editColumn('acao', function($matricula){
                return '
                    <div class="btn-group btn-group-sm">
                        <a href="/Matricula/'.$matricula->id.'/edit"
                            class="btn btn-info"
                            title="Editar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="#"
                            class="btn btn-danger btnExcluir"
                            data-id="'.$matricula->id.'"
                            title="Excluir" data-toggle="tooltip">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>';
            })
            ->editColumn('curso', function($matricula){
                
                return $matricula->matricula_curso();
            })
            ->editColumn('aluno', function($matricula){
        
                return $matricula->matricula_aluno();
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
        $matricula = Matricula::find($id);
        $alunos = Aluno::select('id','nome')->orderBy('nome')->get();
        $cursos = Curso::select('id','nome')->orderBy('nome')->get();
        return view('Matricula.edit', compact('matricula', 'alunos', 'cursos'));
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
            $matricula = Matricula::find($id);
            $matricula->fk_aluno = $request->fk_aluno;
            $matricula->fk_curso = $request->fk_curso;

            DB::transaction(function() use ($matricula) {
                $matricula->save();
            });
            
            Session::flash('mensagem','Matricula Alterada!');
            return Redirect::to('/Matricula');
        }
        catch(\Exception $error){
            Session::flash('mensagem', 'Erro"');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $ids
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matricula = Matricula::find($id);
        $matricula->delete();
        
        return Redirect::to('/Matricula');
    }
}
