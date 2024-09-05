@extends('layouts.app')
@section('title')
    Agregar poliza SOAT
@endsection
@section('content')
   
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-xl-12">
                            <div class="text-xl-end mt-xl-0 mt-1">
                                <a role="button" href="/dashboard/vehiculos/documentos/soat"
                                   class="btn btn-sm btn btn-info rounded-pill">
                                    <i class="fas fa-undo-alt me-1"></i>Regresar
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <form class="AddForm" id="AddForm" name="AddForm">
                            @csrf
                            <div class="row pb-3">
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <label for="soPolicynumber">Número de poliza </label>
                                    <input type="text" class="form-control soPolicynumber"
                                           name="soPolicynumber"
                                           id="soPolicynumber" value="" autocomplete="off" required>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <label for="soExpeditiondate">Fecha expedición </label>
                                    <input type="date" class="form-control soExpeditiondate"
                                           name="soExpeditiondate"
                                           id="soExpeditiondate" value="" autocomplete="off" required>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <label for="soStartdatevalidity">Fecha inicio de vigencia </label>
                                    <input type="date" class="form-control soStartdatevalidity"
                                           name="soStartdatevalidity"
                                           id="soStartdatevalidity" value="" autocomplete="off" required>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <label for="soExpirationdate">Fecha fin de vigencia </label>
                                    <input type="date" class="form-control soExpirationdate"
                                           name="soExpirationdate"
                                           id="soExpirationdate" value="" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                    <label for="soRatetype">Código tarifa </label>
                                    <input type="text" class="form-control soRatetype"
                                           name="soRatetype"
                                           id="soRatetype" value="" autocomplete="off">
                                </div>
                                <div class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                    <label for="inId">Entidad expide SOAT </label>
                                    <select class="custom-select form-control required inId"
                                            id="inId" name="inId"
                                            style="width: 100%" required>
                                        <option value="">Seleccione...</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <label for="veId">Vehículo </label>
                                    <select class="custom-select form-control select2 required veId"
                                            id="veId" name="veId"
                                            style="width: 100%" required>
                                        <option value="">Seleccione...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                @role('ADMINISTRADOR')
                                <div class="row pb-3">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label for="soShares">PDF</label>
                                            <input type="file" class="form-control Shares"
                                                   name="Shares" id="Shares" placeholder="">
                                            <input type="hidden" class="form-control soShares"
                                                   name="soShares"
                                                   id="soShares" autocomplete="off" value=""
                                                   readonly>
                                            <input type="hidden" class="form-control directory" name="directory"
                                                   id="directory" value=""
                                                   autocomplete="off" required readonly>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    <div class="row pb-3">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-group">
                                                <label for="soShares">PDF</label>
                                                <input type="file" class="form-control Shares"
                                                       name="Shares" id="Shares" placeholder="">
                                                <input type="hidden" class="form-control soShares"
                                                       name="soShares"
                                                       id="soShares" autocomplete="off" value=""
                                                       readonly>
                                                <input type="hidden" class="form-control directory" name="directory"
                                                       id="directory" value=""
                                                       autocomplete="off" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                    @endrole
                            </div>
                            <div class="text-xl-end mt-xl-0 mt-1">
                                <div class="ms-auto">
                                    <a role="button"
                                       class="btn btn-sm btn-primary btn-tool primary-color float-right rounded-pill"
                                       href="/dashboard/vehiculos/documentos/soat">
                                        <i class="fad fa-times me-1"> </i> Cancelar
                                    </a>
                                    <button type="submit"
                                            class="btn btn-sm btn-success btn-tool succ-coloress float-right rounded-pill ml-3">
                                        <i class="fad fa-check me-1"></i> Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script type="module">
        import Appservice from '/services/app/app.service.js'
        import Insurersservice from '/services/insurers/insurers.service.js'
        import Vehiclesservice from '/services/vehicles/vehicles.service.js'
        import SoatService from '/services/soat/soat.service.js'

        /* Obtenemos el listado de las entidades expide el SOAT */
        Insurersservice.getIndex(`/api/dashboard/insurers`).then(function (insurers) {
            $.each(insurers, function (id, value) {
                let html = `<option value="${value.inId}">${value.inInsurername}</option>`
                $('.inId').append(html)
            });
        })

        /* Obtenemos el listado de los vehiculos */
        Vehiclesservice.getIndex(`/api/dashboard/vehicles`).then(function (vehicles) {
            $.each(vehicles, function (id, value) {
                let html = `<option value="${value.veId}">${value.veVehicleplate}</option>`
                $('.veId').append(html)
            });
        })

        /* Obtenemos el usuario de la empresa */
        $(".veId").change(function (e) {
            let veId = $('.veId').val();
            Vehiclesservice.getShow(`/api/dashboard/vehicles/show/${veId}`).then(function (vehicles) {
                $('.directory').val(`${vehicles.username}/vehiculos/${vehicles.veEnginenumber}/soat`);
            })
        });

        //Obtenemos la url de la del documento a subir
        $("#Shares").change(function (e) {
            const url = `/api/dashboard/upload`;
            SoatService.setUpload(url, e)
        });

        /* Funcion que envia el post */
        $.validator.setDefaults({
            submitHandler: function () {
                const formData = Appservice.getData()
                const url = `/api/dashboard/soat/store`;
                SoatService.setStore(url, formData)
                Appservice.getMessage('Se ha guardado correctamente', '/dashboard/vehiculos/documentos/soat')
                return false;
            }
        })

        /* Validamos el formulario */
        $(document).ready(function () {
            $("#AddForm").validate({
                rules: {
                    soPolicynumber: "required",
                    soExpeditiondate: "required",
                    soStartdatevalidity: "required",
                    soExpirationdate: "required",
                    soRatetype: "required",
                    inId: "required",
                    soStatus: "required",
                    Shares: "required",
                    veId: "required",
                },
                messages: {
                    soPolicynumber: "Este campo es requerido",
                    soExpeditiondate: "Este campo es requerido",
                    soStartdatevalidity: "Este campo es requerido",
                    soExpirationdate: "Este campo es requerido",
                    soRatetype: "Este campo es requerido",
                    inId: "Este campo es requerido",
                    soStatus: "Este campo es requerido",
                    Shares: "Este campo es requerido",
                    veId: "Este campo es requerido",
                }
            });
        });

    </script>
@endsection
