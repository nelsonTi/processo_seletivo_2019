@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="/update/{{$usuario->id}}">
                <div class="form-group">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome"
                                   value="{{$usuario->nome}}" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="Digite o email" value="{{$usuario->email}}" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senha"
                                   placeholder="Digite a senha" value="" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="dataNascimento">Data de Nascimento</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento"
                                   placeholder="Digite a data de nascimento" value="{{$usuario->data_nascimento}}" required="">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="/" class="btn btn-primary btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection