@extends('layout')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>usuarios</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-success" href="{{ route('usuarios.create') }}">Criar novo usuario</a>
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
    <th>Email</th>
    <th width="280px">Ações</th>
  </tr>
  @foreach ($usuarios as $usuario)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $usuario->nome }}</td>
    <td>{{ $usuario->email }}</td>
    <td>
      <form action="{{ route('usuarios.destroy',$usuario->id) }}" method="POST">

        <a class="btn btn-info" href="{{ route('usuarios.show',$usuario->id) }}">Listar</a>

        <a class="btn btn-primary" href="{{ route('usuarios.edit',$usuario->id) }}">Editar</a>

        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Excluir</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>

{!! $usuarios->links() !!}

@endsection
