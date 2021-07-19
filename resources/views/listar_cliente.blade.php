{{-- extendndo de lauout app o yelld entra na @section -> parte dinamica da página --}}
@extends('layouts.app') 
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.25/sl-1.3.3/datatables.min.css"/>
@endsection
@section('content')

<div class="container">
    <div class=" pt-4  col-12">
            @if (session()->get('ok'))
                <div class="alert alert-success alert-dismissible col-md-10 col-lg-10 col-xl-10 col-12 ">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5> Sucesso!</h5>
                    {{ session()->get('ok') }}
                </div>
            @endif
            @if (session()->get('erro'))
                <div class="alert alert-danger alert-dismissible col-md-10 col-lg-10 col-xl-10 col-12  ">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5> Error!</h5>
                    {{ session()->get('erro') }}
                </div>
            @endif
                    
        </div>
        
        <a href="{{route('cliente.create')}}" class="btn btn-success mb-3">Cadastrar</a>
        <h5 class="align-self-center d-flex justify-content-center">Clientes<h5>
        <table class=" table table table-bordered table-hover" id="table_cliente">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                
                   @foreach ($clientes as $cliente)
                   <tr>
                        <td>{{$cliente->id}}</td>
                        <td>{{$cliente->nome}}</td>
                        <td>{{ $cliente->cidade}}</td>
                        <td>{{ $cliente->estado}}</td>
                        <td>
                            <a href="{{route('cliente.edit',$cliente->id )}}" class="btn btn-primary">Editar</a>
                            <button type="button" id="btn_ver" class="btn btn-warning" data-toggle="modal" data-target="#modalMais">
                                Ver
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDeletar">
                                Excluir
                            </button>
                        </td>
                    </tr>
                   @endforeach
                           
                      
                    
            </tbody>
        </table>
    </div>
</div>

   <!-- Modal excluir -->
   <div class="modal fade" id="modalDeletar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deseja Excluir?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseja Excluir Este registro de ID:<span id="id_cliente"></span>?
                <span id="token" style="display: none;">{{ csrf_token() }}</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="deletar">Apagar!</button>
            </div>
        </div>
    </div>
</div>

   <!-- Modal mais -->
   <div class="modal fade" id="modalMais" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalhes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
                <div class="modal-body">
                    <div class="card ">
                        <div class="card-header">
                            <span id="id_mm" style="display:none"></span>
                            <span id="nome"  style="margin-left: 100px;">Nome:</span><br>
                        </div>
                        <div class="card-body">
                            <div class="painel-mais" style="margin-left: 100px;">
                                <span id="email"></span><br>
                                <span id="celular"></span><br>
                                <span id="cep"></span><br>
                                <span id="bairro"></span><br> 
                                <span id="endereco"></span><br>
                            </div>
                        </div>
                      </div>
                </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.25/sl-1.3.3/datatables.min.js"></script>
<script>
    $(document).ready( function (){
        $('#table_cliente').DataTable(
                {"bJQueryUI": true,
                    "oLanguage": {
                        "sProcessing":   "Processando...",
                        "sLengthMenu":   "Mostrar _MENU_ registros",
                        "sZeroRecords":  "Não foram encontrados resultados",
                        "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                        "sInfoFiltered": "",
                        "sInfoPostFix":  "",
                        "sSearch":       "Buscar:",
                        "sUrl":          "",
                        "oPaginate": {
                            "sFirst":    "Primeiro",
                            "sPrevious": "Anterior",
                            "sNext":     "Seguinte",
                            "sLast":     "Último",
                        }
                    }, "order": [[ 0, "desc" ]],
                    
                });
        });



        $(document).on("mouseenter click","#table_cliente>tbody>tr",function(){
            let dados = $('#table_cliente').DataTable().row(this).data();
            $("#id_cliente").text(dados[0]);
            $("#id_mm").text(dados[0]);
            
        });


    $("#deletar").click(function(){
        var id=$("#id_cliente").text();
        var _token =$("#token").text();
      
        $.ajax({
                type:"delete",
                url:'{{url()->current()}}/'+id,
                data:{_token:_token},
                success:function(){
                    $('#alert_red').html( 
                            `<div class="alert alert-success alert-dismissible col-md-4 col-4 float-right ">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Alerta!</h5>
                        Frasco Deletado com sucesso!!
                        </div>  `).fadeIn(1000).delay(1000).fadeOut(1000);
                    //id=0;
                    var delay=1000; //1 seconds
                    setTimeout(function(){
                        history.go(0);
        //your code to be executed after 1 seconds
                    },delay);
    
                    
        },error:function(){
                    
                $('#alert_red').html( 
                `<div class="alert alert-danger alert-dismissible col-md-4 col-4 float-right ">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Alerta!</h5>
                erro!!
                </div>  `).fadeIn(3000).delay(2000).fadeOut(4000);
                $(".alert-danger").css("background-color","red");
                        }
        });
            
    });

    

    
    $("#btn_ver").click(function(){
        
    var id= $("#id_mm").text();
    $.ajax({
                   type: "get",
                   url:'{{url()->current()}}/'+id,
                   data:{id:id},
                   dataType:' json ',
                   success: function(data) {
                    
                    $("#nome").text('Nome: '+data.nome);
                    $("#email").text('Email: '+data.email);
                    $("#celular").text('Celular: '+data.celular);
                    $("#cep").text('Cep: '+data.cep);
                    $("#bairro").text('Bairro: '+data.bairro);
                    $("#endereco").text('Rua: '+data.rua);
                    

                   }, error: function(){
                       alert('Ocorreu um erro parece que não há conexão com a internet');
                       
                   }
           });           
       });

      
</script>



@endsection
