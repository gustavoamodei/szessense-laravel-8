
<html>
    <head>
        <title>SZ Essence</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
        @yield('css')
      <style>  
        
    @media (max-width: 768px) { 
      #test{
        color: #00ff00;
        position:absolute;
        margin-left:200px;
      }
    }

  
    @media (min-width: 778px) { 
      #test{
        color: #00ff00;
      }
      #logado{
        position:absolute;
        margin-left:300px;
      }
      nav{
             
       }
    }
    @media (min-width: 992px) { 
      #test{
        color: #00ff00;
        margin-left:600px;
      }
      #logado{
        position:absolute;
        margin-left:300px;
      }
      nav{
            
              
       }
    }
    @media (min-width: 1200px) { 
      #test{
        color: #00ff00;
      }
      #logado{
        position:absolute;
        margin-left:800px;
      }
    }
    </style> 
    </head>
    <body>
        <div class="container-sm container-md container-lg container-xl">
         
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
            {{--conteudo dinamico das paginas--}}
                @yield('content')
            {{--conteudo dinamico das paginas--}}
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
           
            @yield('js')
   <br><br>
   <footer>
     <p class="text-center">  @SZessence</p>
   </footer>
       </body>
 
</div> <!-- container-->  
   <style>


         footer{
             background-color: #42f5b9;
             display: block;
             position: fixed;
             bottom:0;
             left:0;
             width: 100%;
             height: 5%;
             color: black;
             
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