@extends('app') 
@section('section-title') Cadastrar Médico
@endsection
 
@section('js')
<script src="{{asset('js/jquery.inputmask.bundle.min.js')}}" type='text/javascript'></script>
<script src="{{asset('js/medico.form.mask.js')}}" type='text/javascript'></script>
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
  <form class='w-100 mw-50' method="POST" action="{{route('medicos.store')}}">
    {{csrf_field()}}
    <div class='form-row '>
      <div class='form-group col '>
        <input id='nome ' type="text" class='form-control ' name="nome" placeholder="Nome" required/>
      </div>
    </div>
    <div class='form-row '>
      <div class='form-group col '>
        <input id="crm" class="form-control crm-input" type="text" name="crm" placeholder="CRM" required>
      </div>
    </div>
    <div class='form-row '>
      <div class='form-group col '>
        <input id="telefone" class="form-control telefone-input" type="tel" name="telefone" placeholder="Telefone" required>
      </div>
      <div class='form-group col '>
        <input id="telefone_escritorio" class="form-control telefone-input" type="tel" name="telefone_escritorio" placeholder="Telefone do Escritório">
      </div>
    </div>
    <div class='card w-100 '>
      <div class='card-body '>
        <h6 class='ceard-title '>Especialidades</h6>
        <div>
          @foreach ($especialidades as $especialidade)
          <div class='form-check form-check-inline'>
            <input class='form-check-input' type='checkbox' name="especialidades[]" id="{{$especialidade->id}}" value="{{$especialidade->id}}">
            <label class="form-check-label" for="{{$especialidade->id}}">{{$especialidade->nome}}</label>
          </div>
          @endforeach
        </div>
        @if($especialidades->count() ==- 0)
          <div class='alert alert-info text-center'>Não existe nenhuma especialidade cadastrada no banco de dados!</div>
        @endif
      </div>
    </div>
    <div class='pt-2 d-flex justify-content-end'>
      <button type="submit" class="btn btn-primary">CADASTRAR</button>
    </div>
  </form>
</div>
@endsection