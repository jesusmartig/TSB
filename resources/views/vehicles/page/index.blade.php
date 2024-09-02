@extends('layouts.app')
@section('title')
    Vehículos
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist"></ul>
                    <div>
                        <div class="btn-wrapper">
                            <a href="/dashboard/vehiculos/crear" class="btn btn-primary text-white me-0"><i
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
                                                <th>Movil</th>
                                                <th>Placa</th>
                                                <th>Marca</th>
                                                <th>Clase de vehículo</th>
                                                <th>Modelo</th>
                                                <th>Tipo Carrocería</th>
                                                <th>Capacidad</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
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
    <script type="module">
        import Appservice from '/services/app/app.service.js'

        $(document).ready(function () {
            $('#DataTables').DataTable({
                "autoWidth": false,
                ajax: {
                    url: '/api/dashboard/vehicles',
                    type: 'GET',
                    dataSrc: 'vehicles'
                },
                columns: [
                    {
                        data: "vcInternalnumber",
                        render: function (data, type, row, meta) {
                            return data;
                        },
                    },
                    {
                        data: "veVehicleplate",
                        render: function (data, type, row, meta) {
                            return data;
                        },
                    },
                    {
                        data: "brName",
                        render: function (data, type, row, meta) {
                            return data;
                        },
                    },
                    {
                        data: "vcClassname",
                        render: function (data, type, row, meta) {
                            return data;
                        },
                    },
                    {
                        data: "veModel",
                        render: function (data, type, row, meta) {
                            return data;
                        },
                    },
                    {
                        data: "veBodytype",
                        render: function (data, type, row, meta) {
                            return data;
                        },
                    },
                    {
                        data: "vePassengercapacity",
                        render: function (data, type, row, meta) {
                            return data;
                        },
                    },
                    {
                        data: "veVehiclestatus",
                        render: function (data, type, row, meta) {
                            if (1 === data) {
                                return type === "display" ?
                                    `<h5><span class="badge bg-success-lighten text-success">${Appservice.getStatus(data)}</span></h5>`
                                    : data;
                            } else {
                                return type === "display" ?
                                    `<h5><span class="badge bg-danger-lighten text-danger">${Appservice.getStatus(data)}</span></h5>`
                                    : data;
                            }
                        },
                    },
                    {
                        data: "veId",
                        render: function (data, type, row, meta) {
                            return type === "display" ?
                                `<div class="table-action">

                                <a role="button" href="/dashboard/vehiculos/actualizar/${data}"
                                    class="action-icon">
                                    <i class="fal fa-edit"></i>
                                </a>

                                <a role="button" href="/dashboard/vehiculos/perfil/${data}" class="action-icon">
                                  <i class="fal fa-eye"></i>
                                </a>

                                <a role="button" href="/${row['expAttachedsupportexperience']}"
                                    class="action-icon" target="_blank">
                                     <i class="fal fa-cloud-download"></i>
                                </a>

                                <a role="button" href="/vehículos/ficha-tecnica/${data}" target="_blank" class="action-icon">
                                   <i class="far fa-address-card"></i>
                                </a>

                                </div>`
                                : data;
                        },
                    },
                ],
                rowId: "veId",
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
