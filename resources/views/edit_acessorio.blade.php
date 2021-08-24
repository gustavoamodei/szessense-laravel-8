@extends('layouts.app')
@section('content')
<h5 class="align-self-center d-flex justify-content-center mt-3"> Edição de acessório  </h5>

<form method="post"  action="{{route('acessorio.update',$acessorio->id)}}">
 @method('PUT')
    @include('alerts.alert')   
    @include('forms.form_acessorio')
</form>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
        
        $('#valor').mask('000.000.000.000.000,00', {reverse: true});
        });
    </script>
@endsection