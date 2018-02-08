@extends('app')

@section('content')

    <div class="container">
        <h3> Editar Cliente</h3>

        @include('errors._check')
        <form action="{{route('clientes.update',$result->id)}}" class="form">
            @method('put')
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Nome</div>
                    <input class="form-control" name="nome" value="{{$result->nome}}">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">E-mail</div>
                    <input class="form-control" name="email" value="{{$result->email}}">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Data de Nasc.</div>
                    <input class="form-control" name="data_nascimento" value="{{$result->data_nascimento}}">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">DDD</div>
                    <select class="form-control" name="ativo">
                        <option value="Ativo" {{($result->ativo === 'Ativo')? 'selected': ''}}>Ativo</option>
                        <option value="Inativo" {{($result->ativo === 'Inativo')? 'selected': ''}}>Inativo</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-lg btn-primary">
            </div>

        @csrf
        <!-- ... -->
        </form>

    </div>
@endsection
