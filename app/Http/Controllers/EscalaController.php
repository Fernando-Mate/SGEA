<?php

namespace App\Http\Controllers;

use App\Models\Escala;
use App\Models\User;
use Illuminate\Http\Request;

class EscalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function storeEscala(Request $request)
    {
        $escala = new Escala();
        $escala->data = $request->input('data');
        $escala->nr_agentes = $request->input('nr_agentes');
        $escala->locais = $request->input('locais');
        $escala->chefe_grupo = $request->input('chefe_grupo');
        $escala->save();
        return redirect()->route('home')->with('mensagem', 'Escala cadastrada com sucesso');

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
        $escala = User::find($id);
        $escala->data = $request->input('data');
        $escala->nr_agentes = $request->input('nr_agentes');
        $escala->locais = $request->input('locais');
        $escala->chefe_grupo = $request->input('chefe_grupo');
        $escala->save();
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
        //
    }
}
