<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Throwable;

use function PHPUnit\Framework\throwException;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes= Cliente::all();
        return view('listar_cliente',['clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crear_cliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateClienteRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateClienteRequest $request)
    {
       try{ 
            $cliente=$request->all();
            Cliente::create($cliente);
            $request->session()->flash('ok','Cliente  cadastrado com sucesso!');
            return redirect()->route('cliente.index');
       }catch(Throwable $e){
            $request->session()->flash('erro','Erro Não foi possível cadastrar !');
            return redirect()->route('cliente.index');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente= Cliente::find($id);
        return json_encode($cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            if($cliente = Cliente::find($id)){
                return view("edit_cliente",['cliente'=>$cliente]);
            }else{
                throw new Exception("cliente não existe!");
            }
        }catch(Throwable $e){
            session()->flash('erro',"Não foi possivel recuperar o cliente ou ele não existe");    
            return redirect()->route("cliente.index");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateClienteRequest $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateClienteRequest $request, $id)
    {
        try{
            if($cliente = Cliente::find($id)){
                $data=$request->all();
                $cliente->update($data);
                return redirect()->route("cliente.index");
            }
        }catch(Throwable $e){
            session()->flash('erro',"Não foi possivel atualizar o cliente !");
            return redirect()->route("cliente.index");

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::where('id',$id)->delete();
    }
}
