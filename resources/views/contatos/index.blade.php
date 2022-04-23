@extends('layout')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>contatos</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-success" href="{{ route('contatos.create') }}">Criar novo contato</a>
    </div>
  </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
  <tr>
    <th>#</th>
    <th>Nome</th>
    <th>Número</th>
    <th width="280px">Ações</th>
  </tr>
  @foreach ($contatos as $contato)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $contato->nome }}</td>
    <td>{{ $contato->numero }}</td>
    <td>
      <form action="{{ route('contatos.destroy',$contato->id) }}" method="POST">

        <a class="btn btn-info" href="{{ route('contatos.show',$contato->id) }}">Listar</a>

        <a class="btn btn-primary" href="{{ route('contatos.edit',$contato->id) }}">Editar</a>

        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Excluir</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>

{!! $contatos->links() !!}

@endsection
