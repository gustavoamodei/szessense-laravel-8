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
        
        <a href="{{route('oleo_essencial.create')}}" class="btn btn-success mb-3">Cadastrar</a>
        <h5 class="align-self-center d-flex justify-content-center">Oleo Essencial<h5>
        <table class=" table table table-bordered table-hover" id="table_oe">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">valor de compra</th>
                <th scope="col">Preço gota</th>
                <th scope="col">Ml</th>
                <th scope="col">Validade</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                
                   @foreach ($oes as $oe)
                   <tr>
                        <td>{{$oe->id}}</td>
                        <td>{{$oe->nome}}</td>
                        <td>{{ number_format($oe->valor_compra, 2 , ",", "."); }}</td>
                        <td>{{ number_format($oe->preco_gota, 2 , ",", "."); }}</td>
                        <td>{{ $oe->ml }}</td>
                        <td>{{ $oe->validade }}</td>
                        <td>
                            <a href="{{route('oleo_essencial.edit',$oe->id )}}" class="btn btn-primary">Editar</a>
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
                Deseja Excluir Este registro de ID:<span id="id_oe"></span>?
                <span id="token" style="display: none;">{{ csrf_token() }}</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="deletar">Apagar!</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.25/sl-1.3.3/datatables.min.js"></script>
<script>
    $(document).ready( function (){
        $('#table_oe').DataTable(
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



        $(document).on("mouseenter click","#table_oe>tbody>tr",function(){
        let dados = $('#table_oe').DataTable().row(this).data();
        $("#id_oe").text(dados[0]);
    });


    $("#deletar").click(function(){
        var id=$("#id_oe").text();
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
</script>
@endsection
