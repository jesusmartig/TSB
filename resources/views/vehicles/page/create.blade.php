@extends('layouts.app')
@section('title')
    Crear vehículos
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist"></ul>
                    <div>
                        <div class="btn-wrapper">
                            <a href="/dashboard/vehiculos" class="btn btn-primary text-white me-0">
                                <i class="fas fa-undo-alt me-1"></i>Regresar
                            </a>
                        </div>
                    </div>
                </div>
            <form class="AddForm" id="AddForm" name="AddForm">
                @csrf
                <div id="basicwizard">
                 <div class="card mb-2">
                  <div class="card-body">

                    <ul class="nav nav-pills nav-justified form-wizard-header mb-4">
                        <li class="nav-item">
                            <a href="#basictab0" data-bs-toggle="tab" data-toggle="tab"
                               class="nav-link rounded-0 py-2">
                                <span class="d-none d-sm-inline">Datos del propietario</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#basictab1" data-bs-toggle="tab" data-toggle="tab"
                               class="nav-link rounded-0 py-2">
                                <span class="d-none d-sm-inline">Información del vehículo</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#basictab2" data-bs-toggle="tab" data-toggle="tab"
                               class="nav-link rounded-0 py-2">
                                <span class="d-none d-sm-inline">Información general</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#basictab3" data-bs-toggle="tab" data-toggle="tab"
                               class="nav-link rounded-0 py-2">
                                <span class="d-none d-sm-inline">Datos Técnicos y Convenios</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#basictab4" data-bs-toggle="tab" data-toggle="tab"
                               class="nav-link rounded-0 py-2">
                                <span class="d-none d-sm-inline">Otros datos</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content b-0 mb-0">
                        <div class="tab-pane" id="basictab0">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="row pb-3">
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                <label for="vcTypevehicle">Seleccione el tipo de vehículo a
                                                    ingresar</label>
                                                <select
                                                    class="custom-select form-control select2 required vcTypevehicle"
                                                    id="vcTypevehicle" name="vcTypevehicle" required
                                                    style="width: 100%">
                                                    <option value="">Seleccione...</option>
                                                    <option value="1">VEHÍCULO PROPIOS</option>
                                                    <option value="2">VEHICULO DE TERCEROS</option>
                                                    <option value="3">VEHÍCULO POR CONVENIO</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                <label for="veVehiclestatus">Seleccione el propietario</label>
                                                <select
                                                    class="custom-select form-control select2 required acId"
                                                    id="acId" name="acId" required
                                                    style="width: 100%">
                                                    <option value="">Seleccione...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <ul class="list-inline wizard mb-0">
                                            <li class="next list-inline-item float-end">
                                                <button type="button" onclick="validar('basictab0')"
                                                        class="btn btn-info validation">
                                                    Siguiente <i class="far fa-chevron-right ms-1"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="basictab1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="row pb-3">
                                            <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                <label for="veVehicleplate">Placa </label>
                                                <input type="text" class="form-control veVehicleplate"
                                                       name="veVehicleplate"
                                                       id="veVehicleplate" value="" autocomplete="off">
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                <label for="veTransitlicensenumber">Nro. de licencia de
                                                    tránsito </label>
                                                <input type="text" class="form-control veTransitlicensenumber"
                                                       name="veTransitlicensenumber"
                                                       id="veTransitlicensenumber" value="" autocomplete="off">
                                            </div>
                                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <label for="veVehiclestatus">Estado </label>
                                                <select
                                                    class="custom-select form-control select2 required veVehiclestatus"
                                                    id="veVehiclestatus" name="veVehiclestatus" required
                                                    style="width: 100%">
                                                    <option value="">Seleccione...</option>
                                                    <option value="1">ACTIVO</option>
                                                    <option value="2">INACTIVO</option>
                                                    <option value="3">REGISTRADO</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <label for="vcPrefix">Clase de vehículo </label>
                                                <select
                                                    class="custom-select form-control select2 required vcPrefix"
                                                    id="vcPrefix" name="vcPrefix" required
                                                    style="width: 100%">
                                                    <option value="">Seleccione...</option>
                                                </select>
                                            </div>
                                        </div>

                                        <ul class="pager wizard mb-0 list-inline">
                                            <li class="previous list-inline-item">
                                                <button type="button" class="btn btn-light"> 
                                                    <i class="far fa-chevron-left me-1"></i>Atrás
                                                </button>
                                            </li>
                                            <li class="next list-inline-item float-end">
                                                <button type="button" onclick="validar('basictab1')"
                                                        class="btn btn-info validation">Siguiente 
                                                        <i class="far fa-chevron-right"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane" id="basictab2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="row pb-3">
                                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <label for="brId">Marca </label>
                                                <select class="custom-select form-control select2 required brId"
                                                        id="brId" name="brId" required
                                                        style="width: 100%">
                                                    <option value="">Seleccione...</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                <label for="veLine">Linea </label>
                                                <input type="text" class="form-control veLine"
                                                       name="veLine"
                                                       id="veLine" value="" autocomplete="off" required>
                                            </div>
                                            <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                <label for="veModel">Modelo </label>
                                                <input type="text" class="form-control veModel"
                                                       name="veModel"
                                                       id="veModel" value="" autocomplete="off"
                                                       required>
                                            </div>
                                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <label for="veColor">Color </label>
                                                <input type="text" class="form-control veColor"
                                                       name="veColor"
                                                       id="veColor" value="" autocomplete="off"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <label for="veSerialnumber">Numero de serie </label>
                                                <input type="text" class="form-control veSerialnumber"
                                                       name="veSerialnumber"
                                                       id="veSerialnumber" value="" autocomplete="off">
                                            </div>
                                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <label for="veEnginenumber">Numero de motor </label>
                                                <input type="text" class="form-control veEnginenumber"
                                                       name="veEnginenumber"
                                                       id="veEnginenumber" value="" autocomplete="off">
                                            </div>
                                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <label for="veChassisnumber">Numero de chasis </label>
                                                <input type="text" class="form-control veChassisnumber"
                                                       name="veChassisnumber"
                                                       id="veChassisnumber" value="" autocomplete="off">
                                            </div>
                                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <label for="veVinnumber">Vin </label>
                                                <input type="text" class="form-control veVinnumber"
                                                       name="veVinnumber"
                                                       id="veVinnumber" value="" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                <label for="veCylindercapacity">Cilindraje </label>
                                                <input type="text" class="form-control veCylindercapacity"
                                                       name="veCylindercapacity"
                                                       id="veCylindercapacity" value="" autocomplete="off"
                                                       required>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                <label for="veBodytype">Tipo de carrocería</label>
                                                <input type="text" class="form-control veBodytype"
                                                       name="veBodytype"
                                                       id="veBodytype" value="" autocomplete="off"
                                                       required>
                                            </div>
                                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <label for="fuId">Combustible </label>
                                                <select
                                                    class="custom-select form-control select2 required fuId"
                                                    id="fuId" name="fuId" required
                                                    style="width: 100%">
                                                    <option value="">Seleccione...</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <label for="veInitialenrollmentdate">Fecha matricula </label>
                                                <input type="date" class="form-control veInitialenrollmentdate"
                                                       name="veInitialenrollmentdate"
                                                       id="veInitialenrollmentdate" value="" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <label for="veTransitauthority">Organismo de transito </label>
                                                <input type="text" class="form-control veTransitauthority"
                                                       name="veTransitauthority"
                                                       id="veTransitauthority" value="" autocomplete="off">
                                            </div>
                                            <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                <label for="veDoors">Puertas </label>
                                                <input type="text" class="form-control veDoors"
                                                       name="veDoors"
                                                       id="veDoors" value="" autocomplete="off">
                                            </div>
                                        </div>

                                        <ul class="pager wizard mb-0 list-inline">
                                            <li class="previous list-inline-item">
                                                <button type="button" class="btn btn-light">
                                                    <i class="far fa-chevron-left me-1"></i>Atrás
                                                </button>
                                            </li>
                                            <li class="next list-inline-item float-end">
                                                <button type="button" onclick="validar('basictab2')"
                                                        class="btn btn-info">Siguiente
                                                        <i class="far fa-chevron-right ms-1"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane" id="basictab3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="row pb-3">
                                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <label for="veLoadingcapacity">Capacidad de carga </label>
                                                <input type="text" class="form-control veLoadingcapacity"
                                                       name="veLoadingcapacity"
                                                       id="veLoadingcapacity" value="" autocomplete="off">
                                            </div>
                                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <label for="veGrossvehicleweight">Peso vehicular </label>
                                                <input type="text" class="form-control veGrossvehicleweight"
                                                       name="veGrossvehicleweight"
                                                       id="veGrossvehicleweight" value="" autocomplete="off">
                                            </div>
                                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <label for="vePassengercapacity">Capacidad pasajeros </label>
                                                <input type="text" class="form-control vePassengercapacity"
                                                       name="vePassengercapacity"
                                                       id="vePassengercapacity" value="" autocomplete="off">
                                            </div>
                                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <label for="veNumberaxes">Número de ejes </label>
                                                <input type="text" class="form-control veNumberaxes"
                                                       name="veNumberaxes"
                                                       id="veNumberaxes" value="" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="conventions" style="display: none">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <h5 class="mb-3 text-uppercase">
                                                <i class="mdi mdi-cards-variant me-1"></i>Información del comvenio
                                            </h5>
                                            <div class="row pb-3">
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="form-label">Tipo de convenio </label>
                                                    <div class="selectgroup w-100">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="coTypeagreement"
                                                                   id="coTypeagreement" value="1"
                                                                   class="selectgroup-input">
                                                            <span
                                                                class="selectgroup-button">POR PRÉSTAMOS</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="coTypeagreement"
                                                                   id="coTypeagreement" value="2"
                                                                   class="selectgroup-input">
                                                            <span class="selectgroup-button">EN TRAMITES</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="coTypeagreement"
                                                                   id="coTypeagreement" value="3"
                                                                   class="selectgroup-input">
                                                            <span
                                                                class="selectgroup-button">POR SERVICIOS</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                    <label for="coNitcollaboratingcompany">Nit empresa
                                                        colaboradora</label>
                                                    <input type="text"
                                                           class="form-control coNitcollaboratingcompany"
                                                           name="coNitcollaboratingcompany"
                                                           id="coNitcollaboratingcompany" value=""
                                                           autocomplete="off">
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                    <label for="coCollaboratingcompany">Empresa
                                                        colaboradora</label>
                                                    <input type="text"
                                                           class="form-control coCollaboratingcompany"
                                                           name="coCollaboratingcompany"
                                                           id="coCollaboratingcompany" value=""
                                                           autocomplete="off">
                                                </div>
                                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                    <label for="coAgreementNo">No. Convenio</label>
                                                    <input type="text" class="form-control coAgreementNo"
                                                           name="coAgreementNo"
                                                           id="coAgreementNo" value="" autocomplete="off" readonly>
                                                </div>

                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                    <label for="coExpeditiondate">Fecha de expedición </label>
                                                    <input type="date" class="form-control coExpeditiondate"
                                                           name="coExpeditiondate"
                                                           id="coExpeditiondate" value="" autocomplete="off">
                                                </div>
                                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                    <label for="coExpirationdate">Fecha de vencimiento </label>
                                                    <input type="date" class="form-control coExpirationdate"
                                                           name="coExpirationdate"
                                                           id="coExpirationdate" value="" autocomplete="off">
                                                </div>
                                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                    <label for="coStatus">Estado </label>
                                                    <select class="custom-select form-control coStatus"
                                                            id="coStatus" name="coStatus"
                                                            style="width: 100%">
                                                        <option value="">Seleccione...</option>
                                                        <option value="1" selected>VIGENTE</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">
                                                    <label for="colegallyrepresentative">Representante
                                                        legalmente</label>
                                                    <input type="text"
                                                           class="form-control colegallyrepresentative"
                                                           name="colegallyrepresentative"
                                                           id="colegallyrepresentative" value=""
                                                           autocomplete="off">
                                                </div>
                                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                    <label for="coIdentificationNo">No. identificacion</label>
                                                    <input type="text" class="form-control coIdentificationNo"
                                                           name="coIdentificationNo"
                                                           id="coIdentificationNo" value="" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <h5 class="mb-3 text-uppercase">
                                            <i class="mdi mdi-cards-variant me-1"></i>Información del responsable
                                            del
                                            vehículo
                                        </h5>
                                        <div class="row pb-3">
                                            <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                <label for="dtId">Tipo documento</label>
                                                <select class="form-control dtId" name="dtId"
                                                        id="dtId" style="width: 100%">
                                                    <option value="">Seleccioné...</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <label for="vmResponsibleIdentificationNo">No. identificacion</label>
                                                <input type="text" class="form-control vmResponsibleIdentificationNo"
                                                       name="vmResponsibleIdentificationNo"
                                                       id="vmResponsibleIdentificationNo" value="" autocomplete="off">
                                            </div>
                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                                <label for="vmResponsiblename">Nombre del
                                                    responsable</label>
                                                <input type="text" class="form-control vmResponsiblename"
                                                       name="vmResponsiblename"
                                                       id="vmResponsiblename" value="" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <ul class="pager wizard mb-0 list-inline">
                                            <li class="previous list-inline-item">
                                                <button type="button" class="btn btn-light"></i> 
                                                    <i class="far fa-chevron-left me-1"></i>Atrás
                                                </button>
                                            </li>
                                            <li class="next list-inline-item float-end">
                                                <button type="button" onclick="validar('basictab3')"
                                                        class="btn btn-info">Siguiente
                                                        <i class="far fa-chevron-right ms-1"></i>
                                                        </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="basictab4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        @role('ADMINISTRADOR')
                                        <div class="row pb-3">
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                <input type="hidden" class="form-control usId transport-companies"
                                                       name="usId"
                                                       id="usId"
                                                       value="{{\Illuminate\Support\Facades\Auth::user()->id}}"
                                                       required
                                                       readonly>
                                                <input type="hidden" class="form-control username"
                                                       name="username"
                                                       id="username"
                                                       value="{{\Illuminate\Support\Facades\Auth::user()->username}}"
                                                       required
                                                       readonly>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="form-group">
                                                    <label for="Attachedbankcertificate">Terjeta de propiedad</label>
                                                    <input type="file" class="form-control Shares"
                                                           name="Shares" id="Shares" placeholder="">
                                                    <input type="hidden"
                                                           class="form-control veShares"
                                                           name="veShares"
                                                           id="veShares" autocomplete="off"
                                                           value=""
                                                           readonly>
                                                    <input type="hidden" class="form-control directory"
                                                           name="directory"
                                                           id="directory"
                                                           value="{{\Illuminate\Support\Facades\Auth::user()->username}}/vehiculos/"
                                                           autocomplete="off" required readonly>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                            <div class="row pb-3">
                                                <div class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                                    <label for="usId">Empresas de transporte</label>
                                                    <select class="form-control usId transport-companies"
                                                            name="usId"
                                                            id="usId" style="width: 100%" required>
                                                        <option value="">Seleccioné...</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                                    <div class="form-group">
                                                        <label for="Shares">Terjeta de propiedad</label>
                                                        <input type="file" class="form-control Shares"
                                                               name="Shares" id="Shares" placeholder="">
                                                        <input type="hidden" class="form-control veShares"
                                                               name="veShares"
                                                               id="veShares" autocomplete="off" value="" readonly>
                                                        <input type="hidden" class="form-control directory"
                                                               name="directory" id="directory" value=""
                                                               autocomplete="off" required readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            @endrole
                                    </div>
                                    <div class="row">
                                        <ul class="pager wizard mb-0 list-inline mt-1">
                                            <li class="previous list-inline-item">
                                                <button type="button" class="btn btn-light">
                                                    <i class="far fa-chevron-left me-1"></i> Atrás
                                                </button>
                                            </li>
                                            <li class="next list-inline-item float-end">
                                                <div class="ms-auto">
                                                    <a role="button"
                                                       class="btn btn-sm btn-primary btn-tool primary-color float-right rounded-pill"
                                                       href="/dashboard/">
                                                        <i class="fad fa-times me-1"> </i> Cancelar
                                                    </a>
                                                    <button type="submit"
                                                            class="btn btn-sm btn-success btn-tool succ-coloress float-right rounded-pill ml-3">
                                                        <i class="fad fa-check me-1"></i> Guardar
                                                    </button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                   </div>
                  </div>
                </div>
            </form>


        </div>

    </div>
@endsection
@section('scripts')
    <script type="module">
        import Appservice from '/services/app/app.service.js'
        import Transportcompanyservice from '/services/transportcompany/transportcompany.service.js'
        import Customersservice from '/services/affiliates/affiliates.service.js'
        import Vehicleclassservice from '/services/vehicleclass/vehicleclass.service.js'
        import Brandssservice from '/services/brands/brands.service.js'
        import Fuelsservice from '/services/fuels/fuels.service.js'
        import DocumenttypeService from '/services/documenttype/documenttype.service.js'
        import AccountantsService from '/services/accountants/accountants.service.js'
        import Vehiclesservice from '/services/vehicles/vehicles.service.js'

        /* Obtenemos el listado de los tipos de documentos */
        DocumenttypeService.getIndex(`/api/dashboard/document-type`).then(function (typedocuments) {
            $.each(typedocuments, function (id, value) {
                let html = `<option value="${value.dtId}">${value.dtName}</option>`
                $('.dtId').append(html)
            });
        })

        /* Obtenemos el listado de las empresas de transporte */
        Transportcompanyservice.getIndex(`/api/dashboard/transportcompanies`).then(function (transportcompanies) {
            $.each(transportcompanies, function (id, value) {
                let html = `<option value="${value.usId}">${value.tcBusinessname}</option>`
                $('.transport-companies').append(html)
            });
        })


        if (loggedInUser.roles[0].name === 'ADMINISTRADOR') {
            $(".veEnginenumber").keyup(function (e) {
                let veEnginenumber = $('.veEnginenumber').val()
                let username = $('username').val()
                $('.directory').val(`${loggedInUser.username}/vehiculos/${veEnginenumber}/licencia_de_transito`);
            });
        } else {
            /* Obtenemos el usuario de la empresa */
            $(".transport-companies").change(function (e) {
                let companies = $('.transport-companies').val();
                Transportcompanyservice.getShow(`/api/dashboard/transportcompanies/showId/${companies}`).then(function (transportcompanies) {
                    let veVehicleplate = $('.veVehicleplate').val();
                    if ($('#veVehicleplate').val().length === 0) {
                        let veEnginenumber = $('.veEnginenumber').val();
                        $('.directory').val(`${transportcompanies.username}/vehiculos/${transportcompanies.veEnginenumber}licencia_de_transito`);
                    } else {
                        $('.directory').val(`${transportcompanies.username}/vehiculos/${transportcompanies.veVehicleplate}licencia_de_transito`);
                    }

                })
            });
        }


        //Obtenemos la url de la del documento a subir
        $("#Shares").change(function (e) {
            if ($('.transport-companies').val().length === 0) {
                Appservice.getAlert('Debe seleccionar la empresa de transporte');
                document.getElementById('Shares').value = '';
                return false;
            } else {
                const url = `/api/dashboard/upload`;
                Vehiclesservice.setUpload(url, e)
            }
        });

        //Activamos el formulario de covenios
        $("#vcTypevehicle").change(function (e) {
            if ($('#vcTypevehicle').val() == 3) {
                $('.conventions').show();
                let companies = 'Agreements'
                AccountantsService.getShow(`/api/dashboard/accountants/show/${companies}`).then(function (accountant) {
                    $('#coAgreementNo').val(accountant)
                })
                return true;
            } else {
                $('.conventions').hide()
                return false;
            }
        });


        /* Obtenemos el listado de los clientes */
        Customersservice.getIndex(`/api/dashboard/affiliates`).then(function (affiliates) {
            $.each(affiliates, function (id, value) {
                let html = `<option value="${value.acId}">${value.afNames} ${value.afSurnames}</option>`
                $('.acId').append(html)
            });
        });

        /* Obtenemos el listado de las clases de vehiculos */
        Vehicleclassservice.getIndex(`/api/dashboard/vehicle-class`).then(function (vehicleclass) {
            $.each(vehicleclass, function (id, value) {
                let html = `<option value="${value.vcPrefix}">${value.vcClassname}</option>`
                $('.vcPrefix').append(html)
            });
        });

        /* Obtenemos el listado de las marcas de los vehiculos  */
        Brandssservice.getIndex(`/api/dashboard/brands`).then(function (brands) {
            $.each(brands, function (id, value) {
                let html = `<option value="${value.brId}">${value.brName}</option>`
                $('.brId').append(html)
            });
        });

        /* Obtenemos el listado de los tipos de cumbustible  */
        Fuelsservice.getIndex(`/api/dashboard/fuels`).then(function (fuels) {
            $.each(fuels, function (id, value) {
                let html = `<option value="${value.fuId}">${value.fuName}</option>`
                $('.fuId').append(html)
            });
        });

        /* Funcion que envia el post */
        $.validator.setDefaults({
            submitHandler: function () {
                const formData = Appservice.getData()
                const url = `/api/dashboard/vehicles/store`;
                Vehiclesservice.setStore(url, formData)
                Appservice.getMessage('Se ha guardado correctamente', '/dashboard/vehiculos')
                return false;
            }
        })

        /* Validamos el formulario */
        $(document).ready(function () {
            $("#AddForm").validate({
                rules: {
                    vcTypevehicle: "required",
                    veVehiclestatus: "required",
                    usId: "required",
                },
                messages: {
                    vcTypevehicle: "Este campo es requerido",
                    veVehiclestatus: "Este campo es requerido",
                    usId: "Este campo es requerido",
                }
            });

        });


    </script>
@endsection
