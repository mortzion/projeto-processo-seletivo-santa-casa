@extends('app') 
@section('section-title') Alterar Especialidade
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

  <form class='w-100 mw-50' method="POST" action="{{route('especialidades.update', $especialidade->id)}}">
    {{csrf_field()}} {{method_field('PATCH')}}
    <div class='form-group'>
      <label for='nome'>Nome</label>
      <input id='nome' type="text" class='form-control' name="nome" autofocus value="{{$especialidade->nome}}" required/>
    </div>
    <div class='d-flex justify-content-end'>
      <button type="submit" class="btn btn-primary mr-2">ATUALIZAR</button>
      <a class='btn btn-secondary ml-2' href='/especialidades/'>CANCELAR</a>
    </div>
  </form>
</div>
@endsection