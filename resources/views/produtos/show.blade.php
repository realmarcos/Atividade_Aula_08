@extends('layout')
@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Produto - {{$produto->descricao}}</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-primary" href="{{ route('produtos.index') }}"> Voltar</a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Descrição:</strong>
      {{ $produto->descricao }}
    </div>
    <div class="form-group">
      <strong>Preço:</strong>
      {{ $produto->preco }}
    </div>
    <div class="form-group">
      <strong>Quantidade:</strong>
      {{ $produto->quantidade }}
    </div>
  </div>
</div>
@endsection
