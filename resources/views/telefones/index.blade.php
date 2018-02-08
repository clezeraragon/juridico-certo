@extends('app')

@section('content')

    <div class="container">
        <h3> Adicionar Telefone ao Cliente</h3>
        <div class="col-xs-12">
            <div class="col-xs-3 col-xs-offset-10">
                <a href="{{route("telefone.create")}}" class="btn btn-success"/>Novo Telefone</a>
            </div>
        </div>
        <hr>
        </br></br>
        <table class="table table-bordered table-striped" id="telefones">
            <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>DDD</th>
                <th>Numero</th>
                <th>Status</th>
                <th>Criado</th>
                <th>Atualizado</th>
                <th>Ações</th>

            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>
@endsection
@section('script')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {

            $('#telefones').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('telefone.ajax.data')}}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'nome_cliente', name: 'cliente.nome'},
                    {data: 'ddd', name: 'ddd'},
                    {data: 'numero', name: 'numero'},
                    {data: 'ativo', name: 'ativo'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

        });
    </script>
@endsection