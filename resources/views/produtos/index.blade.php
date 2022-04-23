@extends('layout')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Produtos</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-success" href="{{ route('produtos.create') }}">Criar novo produto</a>
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
    <th>Descrição</th>
    <th>Preço</th>
    <th>Quantidade</th>
    <th width="280px">Ações</th>
  </tr>
  @foreach ($produtos as $produto)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $produto->descricao }}</td>
    <td>{{ $produto->preco }}</td>
    <td>{{ $produto->quantidade }}</td>
    <td>
      <form action="{{ route('produtos.destroy',$produto->id) }}" method="POST">

        <a class="btn btn-info" href="{{ route('produtos.show',$produto->id) }}">Listar</a>

        <a class="btn btn-primary" href="{{ route('produtos.edit',$produto->id) }}">Editar</a>

        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Excluir</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>

{!! $produtos->links() !!}

@endsection
