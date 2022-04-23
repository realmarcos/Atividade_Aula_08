@extends('layout')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Adicionar novo Usuario</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> Voltar</a>
    </div>
  </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
  <strong>Whoops!</strong> Alguns problemas foram encontrados.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form action="{{ route('usuarios.store') }}" method="POST">
  @csrf

  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Nome:</strong>
        <input type="text" name="nome" class="form-control" placeholder="Nome">
      </div>
      <div class="form-group">
        <strong>Email:</strong>
        <input type="email" name="email" class="form-control" placeholder="Email">
      </div>
      <div class="form-group">
        <strong>Senha:</strong>
        <input type="password" name="password" class="form-control" placeholder="Senha">
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
  </div>

</form>
@endsection
