@extends('app') 
@section('section-title') Buscar Especialidades
@endsection
 
@section('content')
<div class='d-flex flex-column align-items-center'>
  @if (Session::has('message'))
  <div class='alert alert-success text-center ' role='alert '>
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
  <div class='table-responsive w-50 table-hover'>
    <table class='table table-striped table-bordered '>
      <thead>
        <tr class='text-center'>
          <th class='w-100'>Especialidade</th>
          <th>Detalhes</th>
          <th>Editar</th>
          <th>Remover</th>
        </tr>
      </thead>
      <tbody>
        @foreach($especialidades as $especialidade)
        <tr>
          <td>{{$especialidade->nome}}</td>
        <td><a href='{{route("especialidades.show", $especialidade->id)}}' class="btn btn-primary">DETALHES</a></td>
          <td><a href="{{route('especialidades.edit', $especialidade->id)}}" class='btn btn-secondary'>EDITAR</a></td>
          <td>
            <form action="{{route('especialidades.destroy', $especialidade->id)}}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover {{$especialidade->nome}} dos registros?')">
              {{csrf_field()}} {{method_field('DELETE')}}
              <input type='submit' class='btn btn-danger' value="REMOVER" />
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @if($especialidades->count()===0)
    <div class='alert alert-info text-center'>Não existe nenhuma especialidade cadastrada no banco de dados!</div>
    @endif
  </div>
</div>
@endsection