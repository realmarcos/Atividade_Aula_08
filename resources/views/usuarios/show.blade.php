@extends('layout')
@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Usuário - {{$usuario->nome}}</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> Voltar</a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Nome:</strong>
      {{ $usuario->nome }}
    </div>
    <div class="form-group">
      <strong>Email:</strong>
      {{ $usuario->email }}
    </div>
  </div>
</div>
@endsection
