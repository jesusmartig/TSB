@extends('layouts.app')
@section('title')
    Certificado de revisión técnico mecánica (RTM)
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Vehículos</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Documentos</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
                <h4 class="page-title">@yield('title')</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-xl-12">
                            <div class="text-xl-end mt-xl-0 mt-1">
                                <a role="button" href="/dashboard/vehiculos/documentos/certificado-de-revision-tecnico-mecanica/crear"
                                   class="btn btn-sm btn btn-info rounded-pill table-hover table-centered">
                                    <i class="fas fa-plus fa-xs"></i> Agregar (RTM)
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
                                    <th>Fecha expedición</th>
                                    <th>Fecha vencimiento</th>
                                    <th>CDA expide RTM</th>
                                    <th>Vigente</th>
                                    <th>Nro. certificado</th>
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
                    url: '/api/dashboard/rtm',
                    type: 'GET',
                    dataSrc: 'mechanicaltechnicalreview'
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
                        data: "rtmExpeditiondate",
                        render: function (data, type, row, meta) {
                            return data;
                        },
                    },
                    {
                        data: "rtmEffectivedate",
                        render: function (data, type, row, meta) {
                            return data;
                        },
                    },
                    {
                        data: "rtmCdaissuesrtm",
                        render: function (data, type, row, meta) {
                            return data;
                        },
                    },
                    {
                        data: "rtmEffectivedate",
                        render: function (data, type, row, meta) {
                            if (Appservice.getSystemDate() <= data) {
                                return type === "display" ?
                                    `<h4><span class="badge bg-success-lighten text-success">${Appservice.getStatusDate(data)}</span></h4>`
                                    : data;
                            } else {
                                return type === "display" ?
                                    `<h4><span class="badge bg-danger-lighten text-danger">${Appservice.getStatusDate(data)}</span></h4>`
                                    : data;
                            }
                        },
                    },
                    {
                        data: "rtmCertificate",
                        render: function (data, type, row, meta) {
                            return data;
                        },
                    },
                    {
                        data: "rtmId",
                        render: function (data, type, row, meta) {
                            return type === "display" ?
                                `<div class="table-action">

                                <a role="button" href="/dashboard/vehiculos/documentos/certificado-de-revision-tecnico-mecanica/actualizar/${data}"
                                    class="action-icon">
                                    <i class="fal fa-edit"></i>
                                </a>

                                <a role="button" id="btn-delete" data-bs-toggle="modal" data-bs-target="#modalCenter"
                                   class="action-icon">
                                   <i class="fal fa-trash-alt"></i>
                                </a>


                                <a role="button" href="/${row['rtmShares']}"
                                    class="action-icon" target="_blank">
                                     <i class="fal fa-cloud-download"></i>
                                </a>

                                </div>`
                                : data;
                        },
                    },
                ],
                rowId: "rtmId",
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
