<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $objUtilizador;
    public function __construct()
    {
        $this->objUtilizador = new User();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utilizador = $this->objUtilizador->all();
        return view('funcionarios', compact('utilizador'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFuncionario(Request $request)
    {
        $utilizador = new User();
        $utilizador->name = $request->input('nome');
        $utilizador->categoria = $request->input('categoria');
        $utilizador->anos_xp = $request->input('anos_xp');
        $utilizador->ano_ingresso = $request->input('ano_ingresso');
        $utilizador->idade = $request->input('idade');
        $utilizador->sexo = $request->input('sexo');
        $utilizador->password = Hash::make();
        $utilizador->nivelAcesso = 'funcioario';
        $utilizador->save();
        return redirect()->route('home')->with('mensagem', 'Funcionario cadastrado com sucesso');

    }
    public function storeAdmin(Request $request)
    {
        $utilizador = new User();
        $utilizador->name = $request->input('nome');
        $utilizador->funcao = $request->input('funcao');
        $utilizador->telefone = $request->input('telefone');
        $utilizador->inicio_funcoes = $request->input('inicio_funcoes');
        $utilizador->password = Hash::make();
        $utilizador->nivelAcesso = 'Administrador';
        $utilizador->save();
        return redirect()->route('home')->with('mensagem', 'Administrador cadastrado com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $utilizador = User::find($id);
        $utilizador->name = $request->input('nome');
        $utilizador->categoria = $request->input('categoria');
        $utilizador->anos_xp = $request->input('anos_xp');
        $utilizador->ano_ingresso = $request->input('ano_ingresso');
        $utilizador->idade = $request->input('idade');
        $utilizador->sexo = $request->input('sexo');
        $utilizador->save();
        return redirect()->route('utilizador')->with('mensagem', 'Utilizador atuzlizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('Delete from User where id = ?', [$id]);
        return redirect()->route('utilizador')->with('mensagem', 'Utilizador eliminado com sucesso!');

    }
}
