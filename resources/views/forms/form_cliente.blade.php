    @csrf

    <div class="row  align-self-center d-flex justify-content-center">
       
        <div class="col-10 col-md-5 col-lg-3">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control"  name="nome"  value="{{$cliente->nome ?? old('nome')}}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control"  name="email"  value="{{$cliente->email ?? old('email')}}">
            </div>
            <div class="form-group">
                <label>Celular</label>
                <input type="text" class="form-control"  name="celular" id="celular" value="{{$cliente->celular ?? old('celular')}}">
            </div>
        
                <div class="form-group">
                    <label>Cep:</label>
                    <input name="cep" type="text"  class="form-control" id="cep" value="{{$cliente->cep ?? old('cep')}}"  >
                </div>
        </div> 
        <div class="col-10 col-md-5 col-lg-3">
                <div class="form-group">
                    <label>Rua/Complemento:</label>
                    <input name="rua" type="text"  class="form-control" id="rua" value="{{$cliente->rua ?? old('rua')}}" >
                </div>
                <div class="form-group">
                    <label>Bairro:</label>
                    <input name="bairro" type="text"  class="form-control" id="bairro" value="{{$cliente->bairro ?? old('bairro')}}" >
                </div>
                <div class="form-group">
                    <label>Cidade:</label>
                    <input name="cidade" type="text"  class="form-control" id="cidade" value="{{$cliente->cidade ?? old('cidade')}}"  >
                </div>
                <div class="form-group">
                    <label>Estado:</label>
                    <input name="estado" type="text"  class="form-control" id="uf" value="{{$cliente->estado ?? old('estado')}}"  >
                </div>
        </div>
    </div>
    <div class="row align-self-center d-flex justify-content-center mt-3 ">
        
        <div class="col-10 col-md-5 col-lg-3">    
            <div class="form-group">
                <button type="submit" class="btn btn-primary  btn-block" id="btn">Cadastrar</button>
            </div>
        </div>
    </div>
