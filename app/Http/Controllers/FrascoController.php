<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateFrascoRequest;
use App\Models\Frasco;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class FrascoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frascos= Frasco::all();
       // $frascos =  DB::select('select * from frasco order by id desc');
        
        return view('listar_frasco',['frascos'=>$frascos]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crear_frasco');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateFrascoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateFrascoRequest $request)
    {
         try{
            //$data= $request->all();
            $preco = str_replace( '.', '',$request->preco);
            $p=str_replace( ',', '.',$preco);
            $data= $request->except('preco');
            $data['preco']=$p;
            
            Frasco::create($data);
            $request->session()->flash('ok', 'Frasco cadastrado com sucesso!');
            return redirect()->route('frasco.index');
         }catch(Throwable $e){
               // echo $e->getMessage();
              $request->session()->flash('erro', 'Erro não foi possivel cadastrar tente novamente mais tarde!');
              return redirect()->route('frasco.index');
         }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frasco  $frasco
     * @return \Illuminate\Http\Response
     */
    public function show(Frasco $frasco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frasco  $frasco
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            if($frasco  = Frasco::find($id)){
                return view('edit_frasco',['frasco' => $frasco]);
            }else{
                throw new Exception('produto não existe');
            }
        }catch(Throwable $e){
              // echo $e->getMessage();
              session()->flash('erro', 'Erro não foi possível recuperar produto não existe');
              return redirect()->route('frasco.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frasco  $frasco
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateFrascoRequest $request, $id)
    {
        try{
            if($frasco  = Frasco::find($id)){
                $preco = str_replace( '.', '',$request->preco);
                $p=str_replace( ',', '.',$preco);
                $data= $request->except('preco');
                $data['preco']=$p;

                $frasco->update($data);
                return redirect()->route('frasco.index');
                
            }
        }catch(Throwable $e){
            //echo $e->getMessage();
            $request->session()->flash('erro', 'Erro não foi possivel cadastrar tente novamente mais tarde!');
            return redirect()->route('frasco.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frasco  $frasco
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Frasco::where('id',$id)->delete();
    }
}
