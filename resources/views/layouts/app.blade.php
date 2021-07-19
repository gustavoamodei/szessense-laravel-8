<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>SZ Essence</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
        @yield('css')
     
        
    </head>
    <body>
       
         
            <nav class="navbar navbar-expand-lg  navbar-light" style="background-color: #42f5b9;">
            
              <a class="navbar-brand" href="">SZessence</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
              </button>
    
              <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                  <ul class="navbar-nav mr-auto">
                  
                
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span style ="color:black;">Cadastro/Simulação</span>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="">Cadastro de Óleos Essenciais</a>
                        <a class="dropdown-item" href="">Cadastro de Óleos Base</a>
                        <a class="dropdown-item" href="">Cadastro de Clientes</a>
                        <a class="dropdown-item" href="">Cadastro Frascos</a>
                      <a class="dropdown-item" href="">Cadastro Acessórios</a>
                        <a class="dropdown-item" href="">Simulação</a>
                        <a class="dropdown-item" href="">Deslogar</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span style ="color:black;">Listar dados</span>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="">Listar Óleos base</a>
                      <a class="dropdown-item" href="">Listar Óleos Essenciais</a>
                      <a class="dropdown-item" href="">Listar Clientes</a>
                      <a class="dropdown-item" href="">Listar Frascos</a>
                      <a class="dropdown-item" href="">Listar Acessórios</a>
                      <a class="dropdown-item" href="">Listar Orçamentos</a>
                      <a class="dropdown-item" href="">Antiga Tabela De Óleos</a>
                      <a class="dropdown-item" href="">Antiga Tabela De Frasco/Acesórios</a>
                      <a class="dropdown-item" href="">Menu</a>
                    </li>
                    <span id="logado" style=" margin-top:5px">                   
                  <a style=" margin-left: 0px" href="">Logout</a>
                  <span> 
            </nav>

            <div class="container-fluid">
            {{--conteudo dinamico das paginas--}}
                @yield('content')
            {{--conteudo dinamico das paginas--}}
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
           
            @yield('js')
            
           
            <footer>
              <p class="text-center">  @SZessence</p>
            </footer>
          
       </body>
       <style>
         table{
           font-size: 16px;
           font-weight: normal;
         }
       footer{
        
        background-color:  #3ffca4;
        padding-bottom: 1px; 
        display: block;
        position: fixed;
        padding-bottom: 8px;
        bottom:0;
        left:0;
        width: 99.8%
      }
      footer p{
        padding-top: 10px;
      }

      @media screen and (max-width: 768px){
	
        

      }
      </style>
 
</html>

  
{{--
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/meuapp.css') }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
--}}