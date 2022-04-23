@extends('layout')
@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Usuário - {{$contato->nome}}</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-primary" href="{{ route('contatos.index') }}"> Voltar</a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Nome:</strong>
      {{ $contato->nome }}
    </div>
    <div class="form-group">
      <strong>Número:</strong>
      {{ $contato->numero }}
    </div>
  </div>
</div>
@endsection
