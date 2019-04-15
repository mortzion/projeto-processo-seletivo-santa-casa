<!DOCTYPE html>
<html lang="pt-br" class='h-100'>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Projeto para o processo seletivo da Santa Casa</title>
  <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous">
  <link rel='stylesheet' href="{{asset('css/custom.app.css')}}" type='text/css'/>

</head>

<body class='d-flex flex-column h-100'>
  <div class='w-100 text-center'>
    <h1 class='text-center py-3'>Projeto para o processo seletivo da Santa Casa</h1>
  </div>
  <nav class="navbar navbar-expand navbar-dark bg-primary">
    <div class="collapse navbar-collapse justify-content-center">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/">HOME</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role='button' id='navbarMedicosDropdownToggle' data-toggle='dropdown'>MÉDICOS</a>
          <div class='dropdown-menu'>
            <a class="dropdown-item" href="{{route('medicos.index')}}">Buscar</a>
            <a class='dropdown-item' href="{{route('medicos.create')}}">Cadastrar</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role='button' id='navbarEspecialidadesDropdownToggle' data-toggle='dropdown'>ESPECIALIDADES</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('especialidades.index')}}">Buscar</a>
            <a class='dropdown-item' href="{{route('especialidades.create')}}">Cadastrar</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <div class='w-100 text-center py-1' style='background-color:#b0e6fd'>
    <h1 class='text-primary'>@yield('section-title')</h1>
  </div>
  <div class='container py-5'>
    @yield('content')
  </div>
  <footer class='footer mt-auto bg-primary py-2'>
    <h5 class='text-center text-white'>Matheus Prachedes Batista</h5>
  </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  @yield('js')
  <!--<script src="{{ asset('js/app.js') }}" type="text/js"></script>-->
</body>

</html>