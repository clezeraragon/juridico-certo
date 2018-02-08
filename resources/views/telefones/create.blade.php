@extends('app')

@section('content')

    <div class="container">
        <h3> Adicionar Telefone ao Cliente</h3>

        @include('errors._check')
        <form action="{{route('telefone.store')}}" class="form" method="POST">
            @method('POST')
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Cliente</div>
                    <select required class="form-control" name="cliente_id">
                        <option value="" selected>Selecione um Cliente</option>
                        @foreach(JuridicoCerto\Models\Cliente::getComboClientes() as  $key => $cliente)
                            <option value="{{$cliente}}">{{$key}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">DDD</div>
                    <input class="form-control" name="ddd" value="">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Número</div>
                    <input class="form-control" name="numero" value="">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Nome</div>
                    <select class="form-control" name="ativo">
                        <option value="Ativo" >Ativo</option>
                        <option value="Inativo" >Inativo</option>
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
