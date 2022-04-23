@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Produto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('produtos.index') }}"> Voltar</a>
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

    <form action="{{ route('produtos.update',$produto->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descrição:</strong>
                    <input type="text" name="descricao" value="{{ $produto->descricao }}" class="form-control" placeholder="Descrição">
                </div>
                <div class="form-group">
                    <strong>Preço:</strong>
                    <input type="number" step="0.01" name="preco" value="{{ $produto->preco }}" class="form-control" placeholder="Preço">
                </div>
                <div class="form-group">
                    <strong>Quantidade:</strong>
                    <input type="number" name="quantidade" value="{{ $produto->quantidade }}" class="form-control" placeholder="Quantidade">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>

    </form>
@endsection
