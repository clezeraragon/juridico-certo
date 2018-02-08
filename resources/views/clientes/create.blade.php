@extends('app')

@section('content')

    <div class="container">
        <h3> Criar Cliente</h3>

        @include('errors._check')
        <form action="{{route('clientes.store')}}" class="form" method="POST">
            @method('POST')
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Nome</div>
                    <input class="form-control" name="nome" value="" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">E-mail</div>
                    <input class="form-control" name="email" value="" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Data de Nasc.</div>
                    <input class="form-control" name="data_nascimento" value="" type="date" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">DDD</div>
                    <select class="form-control" required>
                        <option value="Ativo" selected>Ativo</option>
                        <option value="Inativo">Inativo</option>
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
