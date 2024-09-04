@extends('layouts.app')
@section('title')
    Agregar tarjeta de operación
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


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-xl-12">
                            <div class="text-xl-end mt-xl-0 mt-1">
                                <a role="button" href="/dashboard/vehiculos/documentos/tarjeta-de-operacion"
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
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <label for="ocAffiliatecompany">Empresa Afiliadora</label>
                                    <input type="text" class="form-control ocAffiliatecompany"
                                           name="ocAffiliatecompany"
                                           id="ocAffiliatecompany" value="" autocomplete="off" required>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <label for="ocExpeditiondate">Fecha de expedición </label>
                                    <input type="date" class="form-control ocExpeditiondate"
                                           name="ocExpeditiondate"
                                           id="ocExpeditiondate" value="" autocomplete="off" required>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <label for="ocExpirationdate">Fecha de vencimiento </label>
                                    <input type="date" class="form-control ocExpirationdate"
                                           name="ocExpirationdate"
                                           id="ocExpirationdate" value="" autocomplete="off" required>
                                </div>
                            </div>
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
                                    <label for="ocOperationcard">No. tarjeta de operació</label>
                                    <input type="text" class="form-control ocOperationcard"
                                           name="ocOperationcard"
                                           id="ocOperationcard" value="" autocomplete="off">
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label for="ocStatus">Vigente </label>
                                    <select class="custom-select form-control ocStatus"
                                            id="ocStatus" name="ocStatus"
                                            style="width: 100%" required>
                                        <option value="">Seleccione...</option>
                                        <option value="1">TARJETA DE OPERACION ACTIVA</option>
                                        <option value="0">TARJETA DE OPERACION CANCELADA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                    <label for="vcInternalnumber">No Interno</label>
                                    <input type="text" class="form-control vcInternalnumber"
                                           name="vcInternalnumber"
                                           id="vcInternalnumber" value="" autocomplete="off" required>
                                </div>
                                <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                    <label for="ocOperationcardtype">Tipo de tarjeta de operación </label>
                                    <select class="custom-select form-control ocOperationcardtype"
                                            id="ocOperationcardtype" name="ocOperationcardtype"
                                            style="width: 100%" required>
                                        <option value="">Seleccione...</option>
                                        <option value="1">POR VEHÍCULO NUEVO</option>
                                        <option value="2">POR RENOVACIÓN</option>
                                        <option value="3">POR CAMBIO DE EMPRESA</option>
                                        <option value="4">VEHÍCULO POR CONVENIO</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                    @role('ADMINISTRADOR')
                                    <div class="form-group">
                                        <label for="ocShares">PDF</label>
                                        <input type="file" class="form-control Shares"
                                               name="Shares" id="Shares" placeholder="">
                                        <input type="hidden" class="form-control ocShares"
                                               name="ocShares"
                                               id="ocShares" autocomplete="off" value=""
                                               readonly>
                                        <input type="hidden" class="form-control directory" name="directory"
                                               id="directory" value="informacion_tecnica/experiencias"
                                               autocomplete="off" required readonly>
                                    </div>
                                    @else
                                        <div class="form-group">
                                            <label for="ocShares">PDF</label>
                                            <input type="file" class="form-control Shares"
                                                   name="Shares" id="Shares" placeholder="">
                                            <input type="hidden" class="form-control ocShares"
                                                   name="ocShares"
                                                   id="ocShares" autocomplete="off" value=""
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
                                       href="/dashboard/vehiculos/documentos/tarjeta-de-operacion">
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
        import OperationcardService from '/services/operationcard/operationcard.service.js'

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
                $('.directory').val(`${vehicles.username}/vehiculos/${vehicles.veEnginenumber}/tarjeta_de_operacion`);
                $('.vcInternalnumber').val(vehicles.vcInternalnumber);
            })
        });

        //Obtenemos la url de la del documento a subir
        $("#Shares").change(function (e) {
            const url = `/api/dashboard/upload`;
            OperationcardService.setUpload(url, e)
        });

        $(".ocOperationcardtype").change(function (e) {

            let vcInternalnumber = $(".vcInternalnumber").val();

            Vehiclesservice.getShow(`/api/dashboard/vehicles/validateinternalnumber/${vcInternalnumber}`).then(function (vehicles) {
                if (vehicles == 0) {
                    // console.log('ok')
                } else {
                    Appservice.getAlert('El número interno ya ha sido asignado.')
                }
            })
        });

        /* Funcion que envia el post */
        $.validator.setDefaults({
            submitHandler: function () {
                const formData = Appservice.getData()
                const url = `/api/dashboard/operationcard/store`;
                OperationcardService.setStore(url, formData)
                Appservice.getMessage('Se ha guardado correctamente', '/dashboard/vehiculos/documentos/tarjeta-de-operacion')
                return false;
            }
        })

        /* Validamos el formulario */
        $(document).ready(function () {
            $("#AddForm").validate({
                rules: {
                    ocAffiliatecompany: "required",
                    ocExpeditiondate: "required",
                    ocValiditystartdate: "required",
                    ocExpirationdate: "required",
                    ocOperationcard: "required",
                    ocShares: "required",
                    ocOperationcardtype: "required",
                    veId: "required",
                    vcInternalnumber: "required",
                },
                messages: {
                    ocAffiliatecompany: "Este campo es requerido",
                    ocExpeditiondate: "Este campo es requerido",
                    ocValiditystartdate: "Este campo es requerido",
                    ocExpirationdate: "Este campo es requerido",
                    ocOperationcard: "Este campo es requerido",
                    ocShares: "Este campo es requerido",
                    ocOperationcardtype: "Este campo es requerido",
                    veId: "Este campo es requerido",
                    vcInternalnumber: "required",
                }
            });
        });

    </script>
@endsection
