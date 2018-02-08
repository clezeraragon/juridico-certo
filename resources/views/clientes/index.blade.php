@extends('app')

@section('content')


    <div class="container">
        <h3> Clientes</h3>
        <div class="col-xs-12">
            <div class="col-xs-3 col-xs-offset-10">
                <a href="{{route("clientes.create")}}" class="btn btn-success"/>Novo Cliente</a>
            </div>
        </div>
<hr>

        </br></br>
        <script id="details-template" type="text/x-handlebars-template">
            <table class="table">
                @verbatim
                    {{#each telefones}}
                    <tr>

                        <td>DDD:</td>
                        <td>{{ddd}}</td>
                        <td>Telefone:</td>
                        <td>{{numero}}</td>
                        <td>Status:</td>
                        <td>{{ativo}}</td>
                    </tr>
                    {{/each}}
                @endverbatim
            </table>
        </script>
        <table class="table table-bordered table-striped" id="cliente">
            <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Data de Nascimeto</th>
                <th>Status</th>
                <th>Ações</th>

            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {

            var template = Handlebars.compile($("#details-template").html());

            var table = $('#cliente').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('clientes.ajax.data')}}',
                columns: [
                    {
                        "className": 'details-control',
                        "orderable": false,
                        "searchable": false,
                        "data": null,
                        "defaultContent": ''
                    },
                    {data: 'id', name: 'id'},
                    {data: 'nome', name: 'nome'},
                    {data: 'email', name: 'email'},
                    {data: 'data_nascimento', name: 'data_nascimento'},
                    {data: 'ativo', name: 'ativo'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                order: [[1, 'asc']]
            });

            // Add event listener for opening and closing details
            $('#cliente tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child(template(row.data())).show();
                    tr.addClass('shown');
                }
            });
        });
    </script>
@endsection