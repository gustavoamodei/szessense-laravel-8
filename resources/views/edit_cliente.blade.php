@extends('layouts.app')
@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>


<!-- Adicionando Javascript -->
<script>

 $(document).ready(function() {
    $('#celular').mask('(00)00000-0000');
     function limpa_formulário_cep() {
         // Limpa valores do formulário de cep.
         $("#rua").val("");
         $("#bairro").val("");
         $("#cidade").val("");
         $("#uf").val("");
         $("#ibge").val("");
     }
     
     //Quando o campo cep perde o foco.
     $("#cep").blur(function() {

         //Nova variável "cep" somente com dígitos.
         var cep = $(this).val().replace(/\D/g, '');

         //Verifica se campo cep possui valor informado.
         if (cep != "") {

             //Expressão regular para validar o CEP.
             var validacep = /^[0-9]{8}$/;

             //Valida o formato do CEP.
             if(validacep.test(cep)) {

                 //Preenche os campos com "..." enquanto consulta webservice.
                 $("#rua").val("...");
                 $("#bairro").val("...");
                 $("#cidade").val("...");
                 $("#uf").val("...");
                 $("#ibge").val("...");

                 //Consulta o webservice viacep.com.br/
                 $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                     if (!("erro" in dados)) {
                         //Atualiza os campos com os valores da consulta.
                         $("#rua").val(dados.logradouro);
                         $("#bairro").val(dados.bairro);
                         $("#cidade").val(dados.localidade);
                         $("#uf").val(dados.uf);
                         $("#ibge").val(dados.ibge);
                     } //end if.
                     else {
                         //CEP pesquisado não foi encontrado.
                         limpa_formulário_cep();
                         alert("CEP não encontrado.");
                     }
                 });
             } //end if.
             else {
                 //cep é inválido.
                 limpa_formulário_cep();
                 alert("Formato de CEP inválido.");
             }
         } //end if.
         else {
             //cep sem valor, limpa formulário.
             limpa_formulário_cep();
         }
     });
 });

</script>
@endsection
@section('content')
<h5 class="align-self-center d-flex justify-content-center mt-3"> Editar  Cliente  </h5>

<form method="post"  action="{{route('cliente.update',$cliente->id)}}">
    @method('PUT')
    @include('alerts.alert')
    @include('forms.form_cliente')
</form>
@endsection