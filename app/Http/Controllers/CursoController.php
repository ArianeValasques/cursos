<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use Redirect;
use DataTables;
// use Illuminate\Support\Facades\Session;
use DB;
use Session;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Curso.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Curso.create');
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
            $curso = new Curso();
            $curso->nome = $request->nome;
            $curso->cargaHoraria = $request->cargaHoraria;
            
            DB::transaction(function() use ($curso) {
                $curso->save();
            });
            
            Session::flash('mensagem','Curso Cadastrado!');
            return Redirect::to('/Curso');
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
        $curso = Curso::get();
            return Datatables::of($curso)
            ->editColumn('acao', function($curso){
                return '
                    <div class="btn-group btn-group-sm">
                        <a href="/Curso/'.$curso->id.'/edit"
                            class="btn btn-info"
                            title="Editar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="#"
                            class="btn btn-danger btnExcluir"
                            data-id="'.$curso->id.'"
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
        $curso = Curso::find($id);
        return view('Curso.edit', compact('curso'));
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
            $curso = Curso::find($id);
            $curso->nome = $request->nome;
            $curso->cargaHoraria = $request->cargaHoraria;

            DB::transaction(function() use ($curso) {
                $curso->save();
            });
            
            Session::flash('mensagem','Curso Alterado!');
            return Redirect::to('/Curso');
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
        $curso = Curso::find($id);
        $curso->delete();
        
        return Redirect::to('/Curso');
    }

    function listCursos(Request $res){
        $curso = Curso::all("id", "nome");

        return $curso;
    }
}
