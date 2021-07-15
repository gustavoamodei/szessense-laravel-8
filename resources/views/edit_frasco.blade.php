@extends('layouts.app')
@section('content')
<h5 class="align-self-center d-flex justify-content-center mt-3"> Edição de Frasco  </h5>

<form method="post"  action="{{route('frasco.update',$frasco->id)}}">
 @method('PUT')
    @include('alerts.alert')   
    @include('forms.form_frasco')
</form>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
        
        $('#money').mask('000.000.000.000.000,00', {reverse: true});
        });
    </script>
@endsection