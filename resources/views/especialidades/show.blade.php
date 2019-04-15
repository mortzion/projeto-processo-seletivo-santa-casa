@extends('app') 
@section('section-title') Buscar Especialidades
@endsection
 
@section('content')
<div class='d-flex justify-content-center'>
  <div class='card w-100 mw-50'>
    <div class='card-body'>
      <h5 class='card-title text-center'>Especialidade</h5>
      <table class='table table-bordered'>
        <tbody>
          <tr>
            <th>Nome</th>
            <td>{{$especialidade->nome}}</td>
          </tr>
          <tr>
            <th>Medicos com esta especialidade</th>
            <td>
              <ul class='list-group list-group-flush'>
                @foreach($especialidade->medicos as $medico)
              <li class='list-group-item'>{{$medico->crm}} - {{$medico->nome}}</li>
                @endforeach
              </ul>
            </td>
          </tr>
        </tbody>
      </table>
      <div class='d-flex justify-content-end'>
      <a href='{{route("especialidades.index")}}' class="btn btn-primary">VOLTAR</a>
        <a href='{{route("especialidades.edit", $especialidade->id)}}' class='btn btn-secondary ml-4'>EDITAR</a>
        <form method="POST" action='{{route("especialidades.destroy", $especialidade->id)}}' onsubmit="return confirm('Tem certeza que deseja remover a especialidade {{$especialidade->nome}} dos registros?')">
          {{csrf_field()}} {{method_field('DELETE')}}
          <input type='submit' class='btn btn-danger ml-4' value='REMOVER' />
        </form>
      </div>
    </div>
  </div>
</div>
@endsection