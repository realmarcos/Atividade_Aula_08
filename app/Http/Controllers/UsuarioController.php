<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $usuarios = Usuario::latest()->paginate(5);

    return view('usuarios.index', compact('usuarios'))
      ->with('i', (request()->input('page', 1) - 1) * 5);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('usuarios.create');
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
      'email' => 'required',
      'password' => 'required',
    ]);

    Usuario::create($request->all());

    return redirect()->route('usuarios.index')
      ->with('success', 'Usuario criado com sucesso!.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Usuario  $usuario
   * @return \Illuminate\Http\Response
   */
  public function show(Usuario $usuario)
  {
    return view('usuarios.show', compact('usuario'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Usuario  $usuario
   * @return \Illuminate\Http\Response
   */
  public function edit(Usuario $usuario)
  {
    return view('usuarios.edit', compact('usuario'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Usuario  $usuario
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Usuario $usuario)
  {
    $request->validate([
      'nome' => 'required',
      'email' => 'required',
      'password' => 'required',
    ]);

    $usuario->update($request->all());

    return redirect()->route('usuarios.index')
      ->with('success', 'Usuario Atualizado com sucesso!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Usuario  $usuario
   * @return \Illuminate\Http\Response
   */
  public function destroy(Usuario $usuario)
  {
    $usuario->delete();

    return redirect()->route('usuarios.index')
      ->with('success', 'Usuario excluido com sucesso!');
  }
}
