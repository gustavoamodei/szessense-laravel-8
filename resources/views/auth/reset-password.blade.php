{{--
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
--}}

<html>
<head>
    <title>SZ Essence</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
</head>
    <body>
    <div id="fundo">
        <img src=app/img/image2.jpg alt="" />
    </div>
        <div class="container">
            <div class="row align-self-center d-flex justify-content-center">
            
                <div class="col-10 col-md-6 mt-1">
                <br><br><br><br><br>
                <div id="back">
                        <label class="row align-self-center d-flex justify-content-center  "> Login</label>
                    
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="post"  action="{{ route('password.update') }}">
                @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>

                        <input type="text" class="form-control" name="email" value="{{old('email', $request->email)}}"   placeholder="Email" required>

                    </div>

                    <div class="form-group ">

                        <label for="exampleInputPassword1">Senha</label>

                        <input type="password" class="form-control" name="password"  placeholder="Senha">

                    </div>
                    <div class="form-group ">

                        <label for="exampleInputPassword1">Confirmar Senha</label>

                        <input type="password" class="form-control" name="password_confirmation"  placeholder="Senha">

                    </div>

                    <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control btn-block">Reset</button>
                    </div>
                </form>
                </div>              
                </div>         
            </div>	
        </div>
    <body>
<html>

<style>
	#fundo img {
    width: 100%; /* com isso imagem ocupará toda a largura da tela. Se colocarmos height: 100% também, a imagem irá distorcer */
    position: absolute;
	height: 100%;
	}
	label {
		color: black;
		font-size: 16pt;
	}
	#back {
  border: 2px solid #999;
  padding: 20px;
  /* controla a distancia entre os elementos e a borda */
  margin: 0px;
  width: 100%;
  background:white;
  /* margem para alinhar o fieldset com o restante do grid */
  padding: 10px;
}
	
</style>