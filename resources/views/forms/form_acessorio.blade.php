@csrf

<div class="row  align-self-center d-flex justify-content-center">
    <div class="col-10 col-md-4">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control"  name="nome"  value="{{$acessorio->nome ?? old('nome')}}">
        </div>
        <div class="form-group">
            <label>Preço</label>
            <input type="text" class="form-control"  name="preco" id="valor" value="{{$acessorio->preco ?? old('preco')}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Descrição</label>
            <textarea class="form-control" name="descricao" rows="7">{{$acessorio->descricao ?? old('descricao')}}</textarea>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary  btn-block" id="btn">Cadastrar</button>
        </div>
    </div>  
</div>
