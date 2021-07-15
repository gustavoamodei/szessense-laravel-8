<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFrascoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id= $this->segment(2);
        return [
            'nome'=>"required|min:3|max:100|unique:frasco,nome,{$id},id",
            'descricao'=>'required|min:3|max:255',
            'preco'=>'required'
        ];
    }

    public function messages()
    {
        return[
            'nome.required'=>'O nome é obrigatório',
            'nome.mim'=>'minimo de 3 caracteres',
            'nome.max'=>'máximo de 255 caracteres',
            'nome.unique'=>'não é possível nomes repetidos ',
            'descricao.required'=>'Descricão  é obrigatório',
            'descricao.mim'=> 'Descricão minima de 3 caracteres',
            'descricao.max'=> 'Descricão máxima de 255 caracteres',
            'preco.required'=>'O preço é obrigatório',
            

        ];
    }
}
