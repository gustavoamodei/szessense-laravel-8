<?php

namespace App\Http\Controllers;

use App\Models\Oleo_Essencial;
use Illuminate\Http\Request;
use Throwable;
use Exception;
class Oleo_Essencial_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oe = Oleo_Essencial::all();
        return view('listar_oleo_essencial',['oes'=>$oe]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crear_oleo_essencial');
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
            $total_gotas=($data['ml'] * 24);
            $preco_gota= ((float)$valor_compra/(float)$total_gotas);
            $new_preco_gota = number_format($preco_gota, 2, '.', '');
            
            $oe = Oleo_Essencial::create([
                'nome' => $data['nome'],
                'ml' => $data['ml'],
                'valor_compra' => $valor_compra,
                'preco_gota' => $new_preco_gota,
                'validade' => $data['validade']
                
            ]);
            
            session()->flash('ok','Óleo Essencial cadastrado com sucesso!');
            return redirect()->route('oleo_essencial.index');
        
        }catch(Throwable $e){
            echo $e->getMessage();
            session()->flash('erro', 'Erro não foi possivel cadastrar tente novamente mais tarde!');
            return redirect()->route('oleo_essencial.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Oleo_Essencial  $oleo_Essencial
     * @return \Illuminate\Http\Response
     */
    public function show(Oleo_Essencial $oleo_Essencial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Oleo_Essencial  $oleo_Essencial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            if($oe=Oleo_Essencial::find($id)){
                return view('edit_oleo_Essencial',['oe'=>$oe]);
            }else{
                throw new Exception('óleo essencial  não existe');
            }
        }catch(Throwable $e){
           echo $e->getMessage();
            //session()->flash('erro','erro não foi possível recuperar óleo base!');
            //return redirect()->route('oleo_essencial.index');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Oleo_Essencial  $oleo_Essencial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $data = $request->input();
            $valor_compra = str_replace( '.', '',$data['valor_compra']);
            $valor_compra = str_replace( ',', '.',$valor_compra);
            $total_gotas=($data['ml'] * 24);
            $preco_gota= ((float)$valor_compra/(float)$total_gotas);
            $new_preco_gota = number_format($preco_gota, 2, '.', '');
            
            
            $oe = Oleo_Essencial::find($id);
            $oe->nome= $request->nome;
            $oe->ml= $request->ml;
            $oe->valor_compra= $valor_compra;
            $oe->preco_gota=$new_preco_gota ;
            $oe->save();            
            session()->flash('ok','Óleo essencial cadastrado com sucesso!');
            return redirect()->route('oleo_essencial.index');
        
        }catch(Throwable $e){
            echo $e->getMessage();
            session()->flash('erro', 'Erro não foi possível cadastrar tente novamente mais tarde!');
            return redirect()->route('oleo_essencial.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oleo_Essencial  $oleo_Essencial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Oleo_Essencial::where('id',$id)->delete();
    }
}
