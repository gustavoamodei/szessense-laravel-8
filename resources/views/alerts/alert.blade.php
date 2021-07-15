@if ($errors->any())
    
    <div class="row align-self-center d-flex justify-content-center text-center">
        <div class="col col-md-6 col-lg-4 col-xl-4 alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>  
        </div> 
    </div>
@endif