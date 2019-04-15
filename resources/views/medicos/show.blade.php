@extends('app') 
@section('section-title') Buscar Médicos
@endsection
 
@section('content')
<div class='d-flex flex-column align-items-center'>
  <div class='card'>
    <div class='card-body'>
      <h5 class='card-title text-center'>{{$medico->nome}}</h5>
      <table class='table table-bordered table-hover'>
        <tbody>
          <tr>
            <th>CRM</th>
            <td>{{$medico->crm}}</td>
          </tr>
          <tr>
            <th>Telefone</th>
            <td>{{$medico->telefone}}</td>
          </tr>
          <tr>
            <th>Telefone do Escritório</th>
            <td>{{$medico->telefone_escritorio}}</td>
          </tr>
          <tr>
            <th>Especialidades</th>
            <td>{{implode(', ', $medico->especialidades->pluck('nome')->all())}}</td>
          </tr>
        </tbody>
      </table>
      <div class='d-flex justify-content-end'>
      <a href='{{route("medicos.index")}}' class='btn btn-primary'>VOLTAR</a>
      <a href='{{route("medicos.edit", $medico->id)}}' class='btn btn-secondary ml-4'>EDITAR</a>
        <form method="POST" action='{{route("medicos.destroy", $medico->id)}}' onsubmit="return confirm('Tem certeza que deseja remover {{$medico->nome}}({{$medico->crm}}) dos registros?')">
          {{csrf_field()}} {{method_field('DELETE')}}
          <input type='submit' class='btn btn-danger ml-4' value='REMOVER'/>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection