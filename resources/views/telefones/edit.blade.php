@extends('app')

@section('content')

    <div class="container">
        <h3> Editar Telefone </h3>

        @include('errors._check')
        <form action="{{route('telefone.update',$result->id)}}" class="form">
            @method('put')
            <input type="hidden" value="{{$result->id}}" name="id">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">DDD</div>
                    <input class="form-control" name="ddd" value="{{$result->ddd}}">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Número</div>
                    <input class="form-control" name="numero" value="{{$result->numero}}">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Status</div>
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
