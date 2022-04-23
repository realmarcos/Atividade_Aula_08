@extends('layout')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Editar contato</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-primary" href="{{ route('contatos.index') }}"> Voltar</a>
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

<form action="{{ route('contatos.update',$contato->id) }}" method="POST">
  @csrf
  @method('PUT')

  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Nome:</strong>
        <input type="text" name="nome" value="{{ $contato->nome }}" class="form-control" placeholder="Nome">
      </div>
      <div class="form-group">
        <strong>Número:</strong>
        <input type="text" name="numero" value="{{ $contato->numero }}" class="form-control" placeholder="Número">
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
  </div>

</form>
@endsection
