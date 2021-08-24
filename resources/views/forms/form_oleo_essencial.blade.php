@csrf

<div class="row  align-self-center d-flex justify-content-center">
    <div class="col-10 col-md-4">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control"  name="nome"  value="{{$oe->nome ?? old('nome')}}">
        </div>
        <div class="form-group">
            <label>Preço de Compra</label>
            <input type="text" class="form-control"  name="valor_compra" id="valor_compra" value="{{$oe->valor_compra ?? old('valor_compra')}}">
        </div>
        <div class="form-group">
            <label>Ml</label>
            <input type="text" class="form-control"  name="ml"  value="{{$oe->ml ?? old('ml')}}">
        </div> 
        <div class="form-group">
            <label>Validade</label>
            <input type="date" class="form-control"  name="validade"  value="{{$oe->validade ?? old('validade')}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary  btn-block" id="btn">Cadastrar</button>
        </div>
    </div>  
</div>