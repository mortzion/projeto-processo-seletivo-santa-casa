@extends('app') 
@section('section-title') Atualizar o Cadastro Médico
@endsection
 
@section('js')
<script src="{{asset('js/jquery.inputmask.bundle.min.js')}}" type='text/javascript'></script>
<script src="{{asset('js/medico.form.mask.js')}}" type='text/javascript'></script>
@endsection

@section('content')
<div class='d-flex flex-column align-items-center '>
  @if (Session::has('message'))
  <div class='w-50 alert alert-success text-center ' role='alert '>
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
  <form class='w-100 mw-50' method="POST" action="{{route('medicos.update', $medico->id)}}">
    {{csrf_field()}} {{method_field('PATCH')}}
    <div class='form-row '>
      <div class='form-group col '>
        <input id='nome ' type="text" class='form-control ' name="nome" placeholder="Nome" value="{{$medico->nome}}" required/>
      </div>
    </div>
    <div class='form-row '>
      <div class='form-group col '>
        <input id="crm" class="form-control" type="text" name="crm" placeholder="CRM" value="{{$medico->crm}}" required>
      </div>
    </div>
    <div class='form-row '>
      <div class='form-group col '>
        <input id="telefone" class="form-control telefone-input" type="tel" name="telefone" placeholder="Telefone" value="{{$medico->telefone}}" required>
      </div>
      <div class='form-group col '>
        <input id="telefone_escritorio" class="form-control telefone-input" type="tel" name="telefone_escritorio" placeholder="Telefone do Escritório"
          value="{{$medico->telefone_escritorio}}">
      </div>
    </div>
    <div class='card w-100 '>
      <div class='card-body '>
        <h6 class='ceard-title '>Especialidades</h6>
        <div>
          @foreach ($especialidades as $especialidade)
          <div class='form-check form-check-inline'>
          <input class='form-check-input' type='checkbox' name="especialidades[]" id="{{$especialidade->id}}" value="{{$especialidade->id}}"
          @if (array_key_exists($especialidade->id, $especialidadesSelecionadas)) checked @endif>
            <label class="form-check-label" for="{{$especialidade->id}}">{{$especialidade->nome}}</label>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class='pt-2 d-flex justify-content-end'>
      <button type="submit" class="btn btn-primary mr-2">ATUALIZAR</button>
      <a class='btn btn-secondary ml-2' href='/medicos/'>CANCELAR</a>
    </div>
  </form>
</div>
@endsection