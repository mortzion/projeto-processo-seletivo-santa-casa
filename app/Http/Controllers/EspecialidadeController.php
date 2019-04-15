<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Especialidade;
use App\Rules\Nome;

class EspecialidadeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $especialidades = Especialidade::orderBy('nome')->get();

    return view('especialidades.index', compact('especialidades'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('especialidades.create');
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
      'nome' => ['required', new Nome(), 'unique:especialidades']
    ]);

    $especialidade = new Especialidade([
      'nome' => $request->get('nome')
    ]);

    $especialidade->save();
    return redirect('/especialidades/create')->with('message', 'Especialdiade cadastrada com sucesso!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $especialidade = Especialidade::with('medicos')->findOrFail($id);
    return view('especialidades.show', compact('especialidade'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $especialidade = Especialidade::findOrFail($id);

    return view('especialidades.edit', compact('especialidade'));
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
      'nome' => ['required', new Nome(), Rule::unique('especialidades')->ignore($id)]
    ]);

    $especialidade = Especialidade::findOrFail($id);
    $especialidade->nome = $request->get('nome');
    $especialidade->save();

    return redirect('/especialidades')->with("message", "Especialidade alterada com sucesso!");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $especialidade = Especialidade::findOrFail($id);
    $especialidade->delete();
    return redirect('/especialidades')->with("message", "Especialidade removida com sucesso");
  }
}
