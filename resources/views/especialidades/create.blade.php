@extends('app') 
@section('section-title') Cadastrar Especialidade
@endsection
 
@section('content')
<div class='d-flex flex-column align-items-center'>
  @if (Session::has('message'))
  <div class='w-50 alert alert-success text-center' role='alert'>
    {{Session::get('message')}}
  </div>
  @endif @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form class='w-100 mw-50' method="POST" action="{{route('especialidades.store')}}">
    {{csrf_field()}}
    <div class='form-group'>
      <input id='nome' type="text" class='form-control' placeholder='Nome' name="nome" autofocus/>
    </div>
    <div class="d-flex justify-content-end">
      <button type="submit" class="btn btn-primary">CADASTRAR</button>
    </div>
  </form>
</div>
@endsection