<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// need to querybuilding and joins etc https://laravel.com/docs/8.x/queries#introduction
use Illuminate\Support\Facades\DB;

// import my models
use App\Models\Cliente;
use App\Models\Direcciones;

class DireccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direcciones = Direcciones::all();

        // return view();
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

          $direcciones = DB::table('clientes')
          ->join('direcciones', 'clientes.id', '=', 'direcciones.cliente_id')
          ->select('clientes.nombre', 'direcciones.id', 'direcciones.direccion')
          ->where('clientes.id', '=', $id)
          ->get();

        if (!$direcciones) {
        
            return redirect('/clientes');
        }
        

        // -- Returns a collection array with 1 client so we need the function first to return the only client
        // return view('cliente.edit')->with('cliente', $cliente);
        return view('direcciones.index')->with('direcciones', $direcciones);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        // $cliente = Cliente::find($id);
        $direccion = Direcciones::find($id);

        // -- Returns a collection array with 1 client so we need the function first to return the only client
        // return view('cliente.edit')->with('cliente', $cliente);
        return view('direcciones.edit')->with('direccion', $direccion);
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

        $direccion = Direcciones::find($id);

        $direccion->direccion = $request->get('direccion');

        $direccion->save();

        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $direccion = Direcciones::find($id);

        $direccion->delete();
        
        return redirect('/clientes');
    }
}
