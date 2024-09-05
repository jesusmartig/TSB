@extends('layouts.app')
@section('title')
    Pólizas de Responsabilidad Civil
@endsection
@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-xl-12">
                            <div class="text-xl-end mt-xl-0 mt-1">
                                <a role="button"
                                   href="/dashboard/vehiculos/documentos/polizas-de-responsabilidad-civil/crear"
                                   class="btn btn-sm btn btn-info rounded-pill table-hover table-centered">
                                    <i class="fas fa-plus fa-xs"></i> Agregar pólizas de responsabilidad civil
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-sm table-centered mb-0" id="DataTables">
                                <thead>
                                <tr>
                                    <th>Placa</th>
                                    <th>Nor. de poliza</th>
                                    <th>Fecha expedición</th>
                                    <th>Fecha vencimiento</th>
                                    <th>Entidad que expide</th>
                                    <th>Tipo de póliza</th>
                                    <th>Estado</th>
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
@endsection
@section('scripts')
    <script type="module">
        import Appservice from '/services/app/app.service.js'

        $(document).ready(function () {
            $('#DataTables').DataTable({
                "autoWidth": false,
                ajax: {
                    url: '/api/dashboard/responsibility',
                    type: 'GET',
                    dataSrc: 'civilresponsibilitypolicies'
                },
                columns: [
                    {
                        data: "veVehicleplate",
                        render: function (data, type, row, meta) {
                            return type === "display" ?
                                `<h4><span class="badge bg-secondary-lighten text-secondary">${data}</span></h4>`
                                : data;
                        },
                    },
                    {
                        data: "cpPolicynumber",
                        render: function (data, type, row, meta) {
                            return data;
                        },
                    },
                    {
                        data: "cpExpeditiondate",
                        render: function (data, type, row, meta) {
                            return data;
                        },
                    },
                    {
                        data: "cpExpirationdate",
                        render: function (data, type, row, meta) {
                            return data;
                        },
                    },
                    {
                        data: "inInsurername",
                        render: function (data, type, row, meta) {
                            return data;
                        },
                    },
                    {
                        data: "cpPolicytype",
                        render: function (data, type, row, meta) {
                            return data;
                        },
                    },
                    {
                        data: "cpExpirationdate",
                        render: function (data, type, row, meta) {
                            if (Appservice.getSystemDate() <= data) {
                                return type === "display" ?
                                    `<h5><span class="badge bg-success-lighten text-success">${Appservice.getStatusDate(data)}</span></h5>`
                                    : data;
                            } else {
                                return type === "display" ?
                                    `<h5><span class="badge bg-danger-lighten text-danger">${Appservice.getStatusDate(data)}</span></h5>`
                                    : data;
                            }
                        },
                    },
                    {
                        data: "cpId",
                        render: function (data, type, row, meta) {
                            if (row['cpShares'] == null) {
                                return type === "display" ?
                                    `<div class="table-action">

                                <a role="button" href="/dashboard/vehiculos/documentos/polizas-de-responsabilidad-civil/actualizar/${data}"
                                    class="action-icon">
                                    <i class="fal fa-edit"></i>
                                </a>

                                <a role="button" id="btn-delete" data-bs-toggle="modal" data-bs-target="#modalCenter"
                                   class="action-icon">
                                   <i class="fal fa-trash-alt"></i>
                                </a>


                                <a role="button" href="#"
                                    class="action-icon" target="_blank">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                </a>

                                </div>`
                                    : data;
                            } else {
                                return type === "display" ?
                                    `<div class="table-action">

                                <a role="button" href="/dashboard/vehiculos/documentos/polizas-de-responsabilidad-civil/actualizar/${data}"
                                    class="action-icon">
                                    <i class="fal fa-edit"></i>
                                </a>

                                <a role="button" id="btn-delete" data-bs-toggle="modal" data-bs-target="#modalCenter"
                                   class="action-icon">
                                   <i class="fal fa-trash-alt"></i>
                                </a>


                                <a role="button" href="/${row['cpShares']}"
                                    class="action-icon" target="_blank">
                                     <i class="fal fa-cloud-download"></i>
                                </a>

                                </div>`
                                    : data;
                            }

                        },
                    },
                ],
                rowId: "cpId",
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
