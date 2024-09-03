@extends('layouts.app')
@section('title')
    Empresas de transporte
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist"></ul>
                    <div>
                        <div class="btn-wrapper">
                            <a href="/dashboard/clientes/crear" class="btn btn-primary text-white me-0"><i
                                    class="icon-download"></i> Crear cliente</a>
                        </div>
                    </div>
                </div>
                <div class="tab-content tab-content-basic">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-sm table-centered mb-0" id="example">
                                        <thead>
                                        <tr>
                                            <th>Razón social</th>
                                            <th>Nit</th>
                                            <th>Telefonos</th>
                                            <th width="5%">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="application/javascript">
        $(document).ready(function () {
            $('#example').DataTable({
                "autoWidth": false,
                ajax: {
                    url: '/api/dashboard/transport-companies',
                    type: 'GET',
                    dataType: 'json',
                    dataSrc: 'data',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', "Bearer " + sessionStorage.getItem('token'));
                    }
                },
                columns: [
                    {
                        data: "attributes.businessName",
                        render: function (data, type, row, meta) {
                            return data;
                        },
                    },
                    {
                        data: "attributes.nit",
                        render: function (data, type, row, meta) {
                            return data + ' - ' + row.attributes.digit;
                        },
                    },
                    {
                        data: "attributes.telephone",
                        render: function (data, type, row, meta) {
                            return data
                        },
                    },
                    {
                        data: "id",
                        render: function (data, type, row, meta) {
                            return type === "display" ?
                                ` <a role="button" href="/dashboard/clientes/actualizar/${data}" class="btn btn-light">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a role="button" href="/dashboard/clientes/perfil/${data}" class="btn btn-light">
                                                <i class="far fa-eye"></i>
                                            </a> `
                                : data;
                        },
                    },
                ],
                rowId: "attributes.id",
                responsive: true,
                select: true,
                language: {
                    sProcessing: "Procesando...",
                    sLengthMenu: "Mostrar _MENU_ registros",
                    sZeroRecords: "No se encontraron resultados",
                    sEmptyTable: "Ningún dato disponible en esta tabla",
                    sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                    sInfoPostFix: "",
                    sSearch: "Buscar:",
                    sUrl: "",
                    sInfoThousands: ",",
                    sLoadingRecords: "Cargando...",
                    oPaginate: {
                        sFirst: "Primero",
                        sLast: "Último",
                        sNext: "Siguiente",
                        sPrevious: "Anterior",
                    },
                    oAria: {
                        sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                        sSortDescending: ": Activar para ordenar la columna de manera descendente",
                    },
                }
            });

        });
    </script>
@endsection
