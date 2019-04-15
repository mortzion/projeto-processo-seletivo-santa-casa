<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Especialidade;
use App\Models\Medico;
use App\Rules\Nome;


class MedicoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $medicos = Medico::all();

    return view('medicos.index', compact('medicos'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $especialidades = Especialidade::orderBy('nome', 'asc')->get();
    return view('medicos.create', compact('especialidades'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'nome' => ['required', new Nome()],
      'crm' => 'numeric|required|unique:medicos',
      'telefone' => 'numeric|required|digits_between:9,11',
      'telefone_escritorio' => 'nullable|numeric|digits_between:9,11'
    ]);

    $medico = new Medico([
      'nome' => $request->get('nome'),
      'crm' => $request->get('crm'),
      'telefone' => $request->get('telefone'),
      'telefone_escritorio' => $request->get('telefone_escritorio')
    ]);

    $medico->save();

    $especialidades = $request->get('especialidades');
    $medico->especialidades()->attach($especialidades);
    return redirect('/medicos/create')->with('message', "Médico cadastrado com sucesso!");
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $medico = Medico::with(['especialidades' => function ($table) {
      $table->orderBy('nome');
    }])->findOrFail($id);
    return view('medicos.show', compact('medico'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $medico = Medico::with('especialidades')->findOrFail($id);
    $especialidades = Especialidade::orderBy('nome', 'asc')->get();

    //Usado para indicar quais especialidades o Médico possui e deixar selecionado no form
    $especialidadesSelecionadas = array();
    foreach ($medico->especialidades as $especialidade) {
      $especialidadesSelecionadas[$especialidade->id] = $especialidade->id;
    }

    return view('medicos.edit', compact('medico', 'especialidades', 'especialidadesSelecionadas'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'nome' => ['required', new Nome()],
      'crm' => ['required', 'numeric', Rule::Unique('medicos')->ignore($id)],
      'telefone' => 'numeric|required|digits_between:9,11',
      'telefone_escritorio' => 'nullable|numeric|digits_between:9,11'
    ]);

    $medico = Medico::findOrFail($id);;

    $medico->nome = $request->get('nome');
    $medico->crm = $request->get('crm');
    $medico->telefone = $request->get('telefone');
    $medico->telefone_escritorio = $request->get('telefone_escritorio');

    $medico->save();

    $especialidades = $request->get('especialidades');
    $medico->especialidades()->sync($especialidades);
    return redirect('/medicos')->with("message", "Médico alterado com sucesso");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $medico = Medico::findOrFail($id);
    $medico->delete();
    return redirect('/medicos')->with("message", "Médico removido com sucesso");
  }
}
