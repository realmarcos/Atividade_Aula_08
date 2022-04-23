<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $contatos = Contato::latest()->paginate(5);

    return view('contatos.index', compact('contatos'))
      ->with('i', (request()->input('page', 1) - 1) * 5);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('contatos.create');
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
      'nome' => 'required',
      'numero' => 'required',
    ]);

    Contato::create($request->all());

    return redirect()->route('contatos.index')
      ->with('success', 'Contato criado com sucesso!.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Contato  $contato
   * @return \Illuminate\Http\Response
   */
  public function show(Contato $contato)
  {
    return view('contatos.show', compact('contato'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Contato  $contato
   * @return \Illuminate\Http\Response
   */
  public function edit(Contato $contato)
  {
    return view('contatos.edit', compact('contato'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Contato  $contato
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Contato $contato)
  {
    $request->validate([
      'nome' => 'required',
      'numero' => 'required',
    ]);

    $contato->update($request->all());

    return redirect()->route('contatos.index')
      ->with('success', 'Contato Atualizado com sucesso!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Contato  $contato
   * @return \Illuminate\Http\Response
   */
  public function destroy(Contato $contato)
  {
    $contato->delete();

    return redirect()->route('contatos.index')
      ->with('success', 'Contato excluido com sucesso!');
  }
}
