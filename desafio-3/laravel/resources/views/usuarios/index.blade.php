@extends('app')
@section('content')
    <div class="row mb-4">
        <div class="col-md-4">
            <a href="/create">
                <button type="button" class="btn btn-primary">Novo Usuário</button>
            </a>
        </div>
        <div >
            @if(Session('message'))
                <div class="alert alert-success" role="alert">
                    {{\Session::get('message')}}
                </div>
            @elseif(Session('alert-success'))
                <div class="alert alert-warning" role="alert">
                    {{\Session::get('alert-success')}}
                </div>
             @endif
        </div>
    </div>

<div class=" row">
    <div class="col-md-12">
        <table class="table  table-hover border shadow">
            <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Data de nascimento</th>
                <th scope="col ="></th>
                <th scope="col ="></th>
            </tr>
            </thead>
            <tbody>
            @if(isset($usuarios) && count($usuarios) > 0)
                @foreach($usuarios as $usuario)
                    <tr>
                        <th scope="row">{{$usuario->nome}}</th>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->data_nascimento}}</td>

                        <td>
                            <a href="edit/{{$usuario->id}}">
                                <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="destroy/{{$usuario->id}}" method="post">
                                {!! csrf_field() !!}
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection