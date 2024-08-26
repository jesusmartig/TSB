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
                            <a href="/dashboard/empresa-de-transporte/crear" class="btn btn-primary text-white me-0"><i
                                    class="icon-download"></i> Crear empresa</a>
                        </div>
                    </div>
                </div>
                <div class="tab-content tab-content-basic">
                    <!-- inicio del perfil -->
                    <div class="container">
                        <div class="main-body">
                            <div class="row gutters-sm">
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                                     alt="Admin" class="rounded-circle" width="150">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <h6 class="d-flex align-items-center mb-3">Project Status</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Nit</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <span id="nit"></span>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Nombre de la empresa</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <span id="company-name"></span>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Dirección</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <span id="address"></span>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Telefono</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <span id="phone"></span>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Celular</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <span id="cell-phone"></span>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Correo electronico</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <span id="email"></span>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>

                                    <div class="row gutters-sm">
                                        <div class="col-sm-6 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h6 class="d-flex align-items-center mb-3">Project Status</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h6 class="d-flex align-items-center mb-3">Project Status</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Fin del perfil -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="module">
        import requestService from '/services/applications/App.service.js'
        import helpersService from '/services/applications/helpers.service.js'

        /* Obtenemos el listado de los departamento */
        /* requestService.Index(`ashboard/transport-companies/show/`).then(function (data) {
             $('#nit').html(data.atrributes.id)
             $('#company-name').html(data.atrributes.id)
             $('#address').html(data.atrributes.id)
             $('#phone').html(data.atrributes.id)
             $('#cell-phone').html(data.atrributes.id)
             $('#email').html(data.atrributes.id)
         });*/

        console.log(helpersService.getAllGetParams(3))

    </script>
@endsection
