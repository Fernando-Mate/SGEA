<?php

namespace App\Http\Controllers;

use App\Models\Alocar;
use App\Models\Escala;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlocarController extends Controller
{

    private $objUtilizador;
    private $objEscala;
    private $objEscalaAgente;
    public function __construct()
    {
        $this->objUtilizador = new User();
        $this->objEscala = new Escala();
        $this->objEscalaAgente = new Alocar();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utilizadores = $this->objUtilizador->all()->where('nivelAcesso', 'agente')->where('estado', 0);
        $escalas = $this->objEscala->all();
        //$escala_agente = $this->objEscalaAgente->all();
        $escala_agente = DB::table('escala_user')
            ->join('users', 'users.id', '=', 'escala_user.user_id')
            ->join('escala', 'escala.id', '=', 'escala_user.escala_id')
            ->select('escala.*', 'users.name')
            ->get();

           // return dump($escala_agente);
        return view('Alocacao', compact('utilizadores', 'escalas', 'escala_agente'));
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
    public function store(Request $request)
    {
        //
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
        //
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
