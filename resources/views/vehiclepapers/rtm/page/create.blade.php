@extends('layouts.app')
@section('title')
    Agregar revisión técnico mecánica (RTM)
@endsection
@section('content')
   
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-xl-12">
                            <div class="text-xl-end mt-xl-0 mt-1">
                                <a role="button"
                                   href="/dashboard/vehiculos/documentos/certificado-de-revision-tecnico-mecanica"
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
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label for="veId">Vehículo </label>
                                    <select class="custom-select form-control select2 veId"
                                            id="veId" name="veId"
                                            style="width: 100%" required>
                                        <option value="">Seleccione...</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label for=rtmExpeditiondate">Fecha expedición </label>
                                    <input type="date" class="form-control rtmExpeditiondate"
                                           name="rtmExpeditiondate"
                                           id="rtmExpeditiondate" value="" autocomplete="off" required>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label for="rtmEffectivedate">Fecha inicio de vigencia </label>
                                    <input type="date" class="form-control rtmEffectivedate"
                                           name="rtmEffectivedate"
                                           id="rtmEffectivedate" value="" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <label for="rtmCdaissuesrtm">CDA expide RTM </label>
                                    <input type="text" class="form-control rtmCdaissuesrtm"
                                           name="rtmCdaissuesrtm"
                                           id="rtmCdaissuesrtm" value="" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <label for="rtmValid">Vigente </label>
                                    <select class="custom-select form-control rtmValid"
                                            id="rtmValid" name="rtmValid"
                                            style="width: 100%" required>
                                        <option value="">Seleccione...</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>

                                </div>
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <label for="rtmCertificate">Nro. certificado </label>
                                    <input type="text" class="form-control rtmCertificate"
                                           name="rtmCertificate"
                                           id="rtmCertificate" value="" autocomplete="off">
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    @role('ADMINISTRADOR')
                                    <div class="form-group">
                                        <label for="rtmShares">PDF</label>
                                        <input type="file" class="form-control Shares"
                                               name="Shares" id="Shares" placeholder="">
                                        <input type="hidden" class="form-control rtmShares"
                                               name="rtmShares"
                                               id="rtmShares" autocomplete="off" value=""
                                               readonly>
                                        <input type="hidden" class="form-control directory" name="directory"
                                               id="directory" value="informacion_tecnica/experiencias"
                                               autocomplete="off" required readonly>
                                    </div>
                                    @else
                                        <div class="form-group">
                                            <label for="rtmShares">PDF</label>
                                            <input type="file" class="form-control Shares"
                                                   name="Shares" id="Shares" placeholder="">
                                            <input type="hidden" class="form-control rtmShares"
                                                   name="rtmShares"
                                                   id="rtmShares" autocomplete="off" value=""
                                                   readonly>
                                            <input type="hidden" class="form-control directory" name="directory"
                                                   id="directory" value=""
                                                   autocomplete="off" required readonly>
                                        </div>
                                        @endrole
                                </div>
                            </div>
                            <div class="text-xl-end mt-xl-0 mt-1">
                                <div class="ms-auto">
                                    <a role="button"
                                       class="btn btn-sm btn-primary btn-tool primary-color float-right rounded-pill"
                                       href="/dashboard/vehiculos/documentos/certificado-de-revision-tecnico-mecanica">
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
        import Vehiclesservice from '/services/vehicles/vehicles.service.js'
        import RtnService from '/services/rtm/rtm.service.js'

        /* Obtenemos el listado de las entidades expide el SOAT */
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
                $('.directory').val(`${vehicles.username}/vehiculos/${vehicles.veEnginenumber}/rtm`);
            })
        });

        //Obtenemos la url de la del documento a subir
        $("#Shares").change(function (e) {
            const url = `/api/dashboard/upload`;
            RtnService.setUpload(url, e)
        });

        /* Funcion que envia el post */
        $.validator.setDefaults({
            submitHandler: function () {
                const formData = Appservice.getData()
                const url = `/api/dashboard/rtm/store`;
                RtnService.setStore(url, formData)
                Appservice.getMessage('Se ha guardado correctamente', '/dashboard/vehiculos/documentos/certificado-de-revision-tecnico-mecanica')
                return false;
            }
        })

        /* Validamos el formulario */
        $(document).ready(function () {
            $("#AddForm").validate({
                rules: {
                    rtmRevisiontype: "required",
                    rtmExpeditiondate: "required",
                    rtmEffectivedate: "required",
                    rtmCdaissuesrtm: "required",
                    rtmValid: "required",
                    rtmCertificate: "required",
                    rtmShares: "required",
                    veId: "required",
                },
                messages: {
                    rtmRevisiontype: "Este campo es requerido",
                    rtmExpeditiondate: "Este campo es requerido",
                    rtmEffectivedate: "Este campo es requerido",
                    rtmCdaissuesrtm: "Este campo es requerido",
                    rtmValid: "Este campo es requerido",
                    rtmCertificate: "Este campo es requerido",
                    rtmShares: "Este campo es requerido",
                    veId: "Este campo es requerido",
                }
            });
        });

    </script>
@endsection
