@extends('layouts.app')
@section('title')
    Actualizar pólizas de responsabilidad civil
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-xl-12">
                            <div class="text-xl-end mt-xl-0 mt-1">
                                <a role="button" href="/dashboard/vehiculos/documentos/polizas-de-responsabilidad-civil"
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
                                    <label for="cpExpeditiondate">Fecha expedición </label>
                                    <input type="date" class="form-control cpExpeditiondate"
                                           name="cpExpeditiondate"
                                           id="cpExpeditiondate" value="" autocomplete="off" required>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <label for="cpStartdatevalidity">Fecha inicio de vigencia </label>
                                    <input type="date" class="form-control cpStartdatevalidity"
                                           name="cpStartdatevalidity"
                                           id="cpStartdatevalidity" value="" autocomplete="off" required>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <label for="cpExpirationdate">Fecha fin de vigencia </label>
                                    <input type="date" class="form-control cpExpirationdate"
                                           name="cpExpirationdate"
                                           id="cpExpirationdate" value="" autocomplete="off" required>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <label for="veId">Vehículo </label>
                                    <select name="veId" class="veId form-control" id="veId" required></select>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">
                                    <label for="inId">Entidad que expide </label>
                                    <select name="inId" class="inId form-control" id="inId"></select>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <label for="cpTakerdocumentnumber">Tomador </label>
                                    <input type="text" class="form-control cpTakerdocumentnumber"
                                           name="cpTakerdocumentnumber"
                                           id="cpTakerdocumentnumber" value="" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label for="cpPolicynumber">Número de poliza </label>
                                    <input type="text" class="form-control cpPolicynumber"
                                           name="cpPolicynumber"
                                           id="cpPolicynumber" value="" autocomplete="off">
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label for="cpPolicynumber">Tipo de póliza </label>
                                    <input type="text" class="form-control cpPolicytype"
                                           name="cpPolicytype"
                                           id="cpPolicytype" value="" autocomplete="off"
                                           required readonly>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label for="cpStatus">Estado </label>
                                    <select class="custom-select form-control cpStatus"
                                            id="cpStatus" name="cpStatus"
                                            style="width: 100%" required>
                                        <option value="">Seleccione...</option>
                                        <option value="1">VIGENTE</option>
                                        <option value="0">INACTIVO</option>
                                        <option value="3">CANCELADA</option>
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
                                            <input type="hidden" class="form-control cpShares"
                                                   name="cpShares"
                                                   id="cpShares" autocomplete="off" value=""
                                                   readonly>
                                            <input type="hidden" class="form-control directory" name="directory"
                                                   id="directory" value="informacion_tecnica/experiencias"
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
                                                <input type="hidden" class="form-control cpShares"
                                                       name="cpShares"
                                                       id="cpShares" autocomplete="off" value=""
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
                                       href="/dashboard/vehiculos/documentos/polizas-de-responsabilidad-civil">
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
        import Civilresponsibilitypolicieservice from '/services/responsibility/responsibility.service.js'

        /* Obtenemos el listado de las entidades expide el SOAT */
        Insurersservice.getIndex(`/api/dashboard/insurers`).then(function (insurers) {
            $.each(insurers, function (id, value) {
                let html = `<option value="${value.inId}">${value.inInsurername}</option>`
                $('.inId').append(html)
            });
        })

        /* Obtenemos el listado de las entidades expide el SOAT */
        Vehiclesservice.getIndex(`/api/dashboard/vehicles`).then(function (vehicles) {
            $.each(vehicles, function (id, value) {
                let html = `<option value="${value.veId}">${value.veVehicleplate}</option>`
                $('.veId').append(html)
            });
        })

        /* Obtenemos los datos del formulario */
        Civilresponsibilitypolicieservice.getShow(`/api/dashboard/responsibility/show/${Appservice.getAllGetParams(5)}`).then(function (civilresponsibilitypolicies) {
            $('.cpPolicynumber').val(civilresponsibilitypolicies.cpPolicynumber)
            $('.cpExpeditiondate').val(civilresponsibilitypolicies.cpExpeditiondate)
            $('.cpStartdatevalidity').val(civilresponsibilitypolicies.cpStartdatevalidity)
            $('.cpExpirationdate').val(civilresponsibilitypolicies.cpExpirationdate)
            $('#inId').val(civilresponsibilitypolicies.inId)
            $('.cpPolicytype').val(civilresponsibilitypolicies.cpPolicytype)
            $('.cpStatus').val(civilresponsibilitypolicies.cpStatus)
            $('.cpTakerdocumenttype').val(civilresponsibilitypolicies.cpTakerdocumenttype)
            $('.cpTakerdocumentnumber').val(civilresponsibilitypolicies.cpTakerdocumentnumber)
            $('.cpShares').val(civilresponsibilitypolicies.cpShares)
            $('#veId').val(civilresponsibilitypolicies.veId)

            $('.directory').val(`${civilresponsibilitypolicies.username}/vehiculos/${civilresponsibilitypolicies.veEnginenumber}/polizas_de_responsabilidad_civil`);


        })


        //Obtenemos la url de la del documento a subir
        $("#Shares").change(function (e) {
            const url = `/api/dashboard/upload`;
            Civilresponsibilitypolicieservice.setUpload(url, e)
        });


        /* Funcion que envia el post */
        $.validator.setDefaults({
            submitHandler: function () {
                const formData = Appservice.getData();
                const url = `/api/dashboard/responsibility/update/${Appservice.getAllGetParams(5)}`;
                Civilresponsibilitypolicieservice.setUpdate(url, formData)
                Appservice.getMessage('Se ha actualizado correctamente', '/dashboard/vehiculos/documentos/polizas-de-responsabilidad-civil')
                return false;
            }
        })

        /* Validamos el formulario */
        $(document).ready(function () {
            $("#AddForm").validate({
                rules: {
                    cpPolicynumber: "required",
                    cpExpeditiondate: "required",
                    cpStartdatevalidity: "required",
                    cpExpirationdate: "required",
                    inId: "required",
                    cpPolicytype: "required",
                    cpStatus: "required",
                    cpTakerdocumenttype: "required",
                    cpTakerdocumentnumber: "required",
                    cpShares: "required",
                    veId: "required",
                },
                messages: {
                    cpPolicynumber: "Este campo es requerido",
                    cpExpeditiondate: "Este campo es requerido",
                    cpStartdatevalidity: "Este campo es requerido",
                    cpExpirationdate: "Este campo es requerido",
                    inId: "Este campo es requerido",
                    cpPolicytype: "Este campo es requerido",
                    cpStatus: "Este campo es requerido",
                    cpTakerdocumenttype: "Este campo es requerido",
                    cpTakerdocumentnumber: "Este campo es requerido",
                    cpShares: "Este campo es requerido",
                    veId: "Este campo es requerido",
                }
            });
        });

    </script>
@endsection
