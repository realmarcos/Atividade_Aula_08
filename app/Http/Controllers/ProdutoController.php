<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $produtos = Produto::latest()->paginate(5);

    return view('produtos.index', compact('produtos'))
      ->with('i', (request()->input('page', 1) - 1) * 5);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('produtos.create');
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
      'descricao' => 'required',
      'preco' => 'required',
      'quantidade' => 'required',
    ]);

    Produto::create($request->all());

    return redirect()->route('produtos.index')
      ->with('success', 'Produto criado com sucesso!.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Produto  $produto
   * @return \Illuminate\Http\Response
   */
  public function show(Produto $produto)
  {
    return view('produtos.show',compact('produto'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Produto  $produto
   * @return \Illuminate\Http\Response
   */
  public function edit(Produto $produto)
  {
    return view('produtos.edit', compact('produto'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Produto  $produto
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Produto $produto)
  {
    $request->validate([
      'descricao' => 'required',
      'preco' => 'required',
      'quantidade' => 'required',
    ]);

    $produto->update($request->all());

    return redirect()->route('produtos.index')
      ->with('success', 'Produto Atualizado com sucesso!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Produto  $produto
   * @return \Illuminate\Http\Response
   */
  public function destroy(Produto $produto)
  {
    $produto->delete();

    return redirect()->route('produtos.index')
      ->with('success', 'Produto excluido com sucesso!');
  }
}
