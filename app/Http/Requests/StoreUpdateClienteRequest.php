<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateClienteRequest extends FormRequest
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
          'nome'=>'required|max:100|min:2|string',
          'email'=>"required|email:rfc,dns|unique:cliente,email,{$id},id",
          'rua'=>'max:60',
          'celular'=> "required|min:14|max:15|unique:cliente,celular,{$id},id",
          'estado'=>'required|max:2|min:2',
          'cidade'=>'required|max:60',
          'bairro'=>'max:40',


        ];
    }
}
