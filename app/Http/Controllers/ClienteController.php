<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// needed to querybuilding and joins etc https://laravel.com/docs/8.x/queries#introduction
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

// import my cliente model
use App\Models\Cliente;
use App\Models\Direcciones;

// to create xml 
use SimpleXMLElement;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the records from dbtable cliente
        $clientes = Cliente::all();
        $this->debug_to_console($clientes);
        return view('cliente.index')->with('clientes', $clientes);
    }

    function debug_to_console($data) {
        $output = $data;
        if (is_array($output)) $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ejercicio4()
    {

        return view('ejercicios.ejercicio4');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ejercicio5()
    {

        return view('ejercicios.ejercicio5');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // we can create an instance of clientes
        $clientes = new Cliente();

        // Validations 
        $rules = array(
                'nombre' => 'required|max:60',
                'correo' => 'required|string|email|unique:clientes|max:60',
                'contacto' => 'required|max:60',
                'telefono' => 'required|integer',
                'direccion' => 'required|max:300'
        );

        $validator = Validator::make($request->all(), $rules, $messages = [
            'nombre.required' => 'El Nombre es requerido.',
            'nombre.max' => 'El Nombre ha excedido la cantidad de caracteres.',

            'correo.required' => 'La Dirección de su correo es requerida.',
            'correo.email' => 'Necesitas una direccion de correo real.',
            'correo.unique' => 'Este correo ya ha sido agregado anteriormente.',
            'correo.max' => 'El Correo ha excedido la cantidad de caracteres.',

            'contacto.required' => 'El Contacto es requerido.',
            'contacto.max' => 'El Contacto ha excedido la cantidad de caracteres.',
            
            'telefono.required' => 'El Telefono es requerido.',
            'telefono.integer' => 'Telefono solo admite números.',
        ]);

        if ($validator->fails()) {
            return redirect('clientes/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // save fields got from user request 
        $clientes->nombre = $request->get('nombre'); // name attr from form
        $clientes->correo = $request->get('correo');
        $clientes->contacto =  $request->get('contacto');
        $clientes->telefono =  $request->get('telefono');

        $clientes->save();

        // ----- Direcciones

        $direcciones = new Direcciones;
        
        $direcciones->direccion = $request->get('direccion');
        $clientes->direcciones()->save($direcciones);
        
        
        if ($request->get('direccionAlternativa')) {
            $direcciones = new Direcciones;
            $direcciones->direccion = $request->get('direccionAlternativa');
            $clientes->direcciones()->save($direcciones);
        }

        
        return redirect('/clientes');
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

        // Returns a collection we need to access in this way $cliente[0]->id 
        $cliente = DB::table('clientes')
                   ->join('direcciones', 'clientes.id', '=', 'direcciones.cliente_id')
                   ->select('clientes.*', 'direcciones.direccion')
                   ->where('clientes.id', '=', $id)
                   ->get();

        $this->debug_to_console($cliente);

        if (count($cliente) === 0) {
            $cliente = Cliente::find($id);
        }else{
            $cliente = $cliente->first();
        }

        // -- Returns a collection array with 1 client so we need the function first to return the only client
        return view('cliente.edit')->with('cliente', $cliente);        
        
        // $direcAux = Cliente::find($id)->direcciones;
        // $this->debug_to_console($direcAux);
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
        $cliente = Cliente::find($id);

        $cliente->nombre = $request->get('nombre');
        $cliente->correo = $request->get('correo');
        $cliente->contacto = $request->get('contacto');
        $cliente->telefono = $request->get('telefono');

        $cliente->save();

        $direccion = DB::table('direcciones')
              ->where('cliente_id', $id) // ! id del direccion
              ->update(['direccion' => $request->get('direccion')]);

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
        $cliente = Cliente::find($id);

        $cliente->delete();
        
        return redirect('/clientes');
    }

    // Ejercicio 3 retornar json con info
    public function indexJson(){

        $clientes = DB::table('clientes')
                    ->join('direcciones', 'clientes.id', '=', 'direcciones.cliente_id')
                    ->select('*')
                    ->get();

        $cantidadClientes = count($clientes);

        if ($cantidadClientes != 0 ) {
           
            $json = array(
    
                "status"=>200,
                "total"=> $cantidadClientes,
                "data"=>$clientes
                
            );
    
            return json_encode($json, true);

        }else{

            $json = array(
                "status"=> "204",
                "total"=> 0,
                "data"=> "No data to show"
            );

            return json_encode($json);
        }

    }


    public function indexXml() {
        
        // $clientes = json_decode(Cliente::All(), true);
        
        $clientes =  DB::table('clientes')
                    ->join('direcciones', 'clientes.id', '=', 'direcciones.cliente_id')
                    ->select('*') // ! especificar campos + headers json
                    ->get();

        $clientes = json_decode($clientes, true);
        
        $xml = new \SimpleXMLElement('<clientes/>');
        $this->to_xml($xml, $clientes, 'cliente');
        return $xml->asXml();

    }

    private function to_xml(SimpleXMLElement $object, array $data, $titleItem ="") {   
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $new_object = $object->addChild( $titleItem);
                $this->to_xml($new_object, $value);
            } else {
                // if the key is an integer, it needs text with it to actually work.
                if ($key != 0 && $key == (int) $key) {
                    $key = "key_$key";
                }

                $object->addChild($key, $value);
            }   
        }   
    }   


}
