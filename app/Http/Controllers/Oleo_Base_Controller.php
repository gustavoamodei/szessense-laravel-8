<?php

namespace App\Http\Controllers;

use App\Models\Oleo_Base;
use Exception;
use Illuminate\Http\Request;
use Throwable;

use function PHPUnit\Framework\throwException;

class Oleo_Base_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ob = Oleo_Base::all();
        return view('listar_oleo_base',['obs'=>$ob]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crear_oleo_base');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data = $request->input();
            $valor_compra = str_replace( '.', '',$data['valor_compra']);
            $valor_compra = str_replace( ',', '.',$valor_compra);
            $preco_ml_calculado=($valor_compra/$data['ml']);
            
            $ob = Oleo_Base::create([
                'nome' => $data['nome'],
                'ml' => $data['ml'],
                'valor_compra' => $valor_compra,
                'preco_ml' => $preco_ml_calculado,
                'validade' => $data['validade']
                
            ]);
            
            session()->flash('ok','Óleo base cadastrado com sucesso!');
            redirect()->route('oleo_base.index');
        
        }catch(Throwable $e){
            echo $e->getMessage();
            session()->flash('erro', 'Erro não foi possivel cadastrar tente novamente mais tarde!');
            return redirect()->route('oleo_base.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Oleo_Base  $oleo_Base
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Oleo_Base  $oleo_Base
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            if($ob=Oleo_Base::find($id)){
                return view('edit_oleo_base',['ob'=>$ob]);
            }else{
                throw new Exception('óleo base  não existe');
            }
        }catch(Throwable $e){
           echo $e->getMessage();
            session()->flash('erro','erro não foi possível recuperar óleo base!');
            return redirect()->route('oleo_base.index');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Oleo_Base  $oleo_Base
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $data = $request->input();
            $valor_compra = str_replace( '.', '',$data['valor_compra']);
            $valor_compra = str_replace( ',', '.',$valor_compra);
            $preco_ml_calculado=($valor_compra/$data['ml']);
            
            $ob = Oleo_Base::find($id);
            $ob->nome= $request->nome;
            $ob->ml= $request->ml;
            $ob->valor_compra= $valor_compra;
            $ob->preco_ml=$preco_ml_calculado ;
            $ob->save();            
            $request->session()->flash('ok','Óleo base cadastrado com sucesso!');
            return redirect()->route('oleo_base.index');
        
        }catch(Throwable $e){
            echo $e->getMessage();
            session()->flash('erro', 'Erro não foi possivel cadastrar tente novamente mais tarde!');
            return redirect()->route('oleo_base.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oleo_Base  $oleo_Base
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Oleo_Base::where('id',$id)->delete();
    }
}
