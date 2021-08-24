<?php

namespace App\Http\Controllers;

use App\Models\Acessorio;
use Illuminate\Http\Request;
use Throwable;
use Exception;

class AcessorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acessorio= Acessorio::all(); 
         return view('listar_acessorio',['acessorios'=>$acessorio]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crear_acessorio');
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
            //$data= $request->all();
            $preco = str_replace( '.', '',$request->preco);
            $p=str_replace( ',', '.',$preco);
            $data= $request->except('preco');
            $data['preco']=$p;
            
            Acessorio::create($data);
            $request->session()->flash('ok', 'Acessório cadastrado com sucesso!');
            return redirect()->route('acessorio.index');
         }catch(Throwable $e){
               // echo $e->getMessage();
              $request->session()->flash('erro', 'Erro não foi possivel cadastrar tente novamente mais tarde!');
              return redirect()->route('acessorio.index');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Acessorio  $acessorio
     * @return \Illuminate\Http\Response
     */
    public function show(Acessorio $acessorio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Acessorio  $acessorio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            if($acessorio  = Acessorio::find($id)){
                return view('edit_acessorio',['acessorio' => $acessorio]);
            }else{
                throw new Exception('acessorio não existe');
            }
        }catch(Throwable $e){
              // echo $e->getMessage();
              session()->flash('erro', 'Erro não foi possível recuperar acessório não existe');
              return redirect()->route('frasco.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Acessorio  $acessorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try{
            if($acessorio  = Acessorio::find($id)){
                $preco = str_replace( '.', '',$request->preco);
                $p=str_replace( ',', '.',$preco);
                $data= $request->except('preco');
                $data['preco']=$p;

                $acessorio->update($data);
                return redirect()->route('acessorio.index');
                
            }
        }catch(Throwable $e){
            //echo $e->getMessage();
            $request->session()->flash('erro', 'Erro não foi possivel cadastrar tente novamente mais tarde!');
            return redirect()->route('acessorio.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acessorio  $acessorio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Acessorio::where('id',$id)->delete();
    }
}
