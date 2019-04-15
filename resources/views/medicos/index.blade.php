@extends('app') 
@section('section-title') Buscar Médicos
@endsection
 
@section('content')
<div class='d-flex justify-content-center'>
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
</div>
<div class='table-responsive table-hover'>
  <table class='table table-striped table-bordered '>
    <thead>
      <tr class='text-center'>
        <th class='w-25'>CRM</th>
        <th class='w-25'>Nome</th>
        <th class='w-25'>Telefone</th>
        <th class='w-25'>Telefone do Escritório</th>
        <th>Detalhes</th>
        <th>Editar</th>
        <th>Remover</th>
      </tr>
    </thead>
    <tbody>
      @foreach($medicos as $medico)
      <tr>
        <td>{{$medico->crm}}</td>
        <td>{{$medico->nome}}</td>
        <td>{{$medico->telefone}}</td>
        <td>{{$medico->telefone_escritorio}}</td>
        <td><a href="{{route('medicos.show', $medico->id)}}" class='btn btn-primary'>DETALHES</a></td>
        <td><a href="{{route('medicos.edit', $medico->id)}}" class='btn btn-secondary'>EDITAR</a></td>
        <td>
          <form action="{{route('medicos.destroy', $medico->id)}}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover {{$medico->nome}}({{$medico->crm}}) dos registros?')">
            {{csrf_field()}} {{method_field('DELETE')}}
            <input type='submit' class='btn btn-danger' value="REMOVER" />
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @if($medicos->count() === 0)
  <div class='alert alert-info text-center'>Não existe nenhum médico cadastrado no banco de dados!</div>
  @endif
</div>
@endsection