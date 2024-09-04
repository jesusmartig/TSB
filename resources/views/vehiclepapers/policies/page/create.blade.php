@extends('layouts.app')
@section('title')
    Agregar pólizas de responsabilidad civil
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
                                <a role="button" href="/dashboard/vehiculos/documentos/polizas-de-responsabilidad-civil" class="btn btn-sm btn btn-info rounded-pill">
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
                                    <select class="custom-select form-control select2 veId"
                                            id="veId" name="veId"
                                            style="width: 100%" required>
                                        <option value="">Seleccione...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">
                                    <label for="inId">Entidad que expide </label>
                                    <select class="custom-select form-control inId"
                                            id="inId" name="inId"
                                            style="width: 100%" required>
                                        <option value="">Seleccione...</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <label for="cpTakerdocumentnumber">Tomador </label>
                                    <input type="text" class="form-control cpTakerdocumentnumber"
                                           name="cpTakerdocumentnumber"
                                           id="cpTakerdocumentnumber" value="" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                    <label for="cpPolicynumber">Número de poliza </label>
                                    <input type="text" class="form-control cpPolicynumber"
                                           name="cpPolicynumber[]"
                                           id="cpPolicynumber" value="" autocomplete="off" required>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label for="cpPolicynumber">Tipo de póliza </label>
                                    <input type="text" class="form-control cpPolicytype"
                                           name="cpPolicytype[]"
                                           id="cpPolicytype" value="Responsabilidad Civil Extracontractual"
                                           autocomplete="off"
                                           required readonly>
                                </div>
                                <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                    <label for="cpPolicynumber">Número de poliza </label>
                                    <input type="text" class="form-control cpPolicynumber"
                                           name="cpPolicynumber[]"
                                           id="cpPolicynumber" value="" autocomplete="off" required>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label for="cpPolicynumber">Tipo de póliza </label>
                                    <input type="text" class="form-control cpPolicytype"
                                           name="cpPolicytype[]"
                                           id="cpPolicytype" value="Responsabilidad Civil Contractual"
                                           autocomplete="off"
                                           required readonly>
                                </div>
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

        /* Obtenemos el usuario de la empresa */
        $(".veId").change(function (e) {
            let veId = $('.veId').val();
            Vehiclesservice.getShow(`/api/dashboard/vehicles/show/${veId}`).then(function (vehicles) {
                $('.username').val(vehicles.username);
                $('.directory').val(`vehiculos/${vehicles.veVehicleplate}/soat`);
            })
        });

        //Obtenemos la url de la del documento a subir
        $("#Shares").change(function (e) {
            if ($('#username').val().length === 0) {
                alert('Debe seleccionar la empresa de transporte');
                document.getElementById('Shares').value = '';
                return false;
            } else {
                const url = `/api/dashboard/upload`;
                SoatService.setUpload(url, e)
            }
        });


        /* Funcion que envia el post */
        $.validator.setDefaults({
            submitHandler: function () {
                const formData = {
                    'cpExpeditiondate': getItens()[0],
                    'cpStartdatevalidity': getItens()[1],
                    'cpExpirationdate': getItens()[2],
                    'inId': getItens()[3],
                    'cpTakerdocumentnumber': getItens()[4],
                    'veId': getItens()[5],
                    'policies': [
                        {
                            'cpPolicynumber': getItens()[6][0],
                            'cpPolicytype': getItens()[6][1],
                        },
                        {
                            'cpPolicynumber': getItens()[7][0],
                            'cpPolicytype': getItens()[7][1],
                        }
                    ],
                    '_token': Appservice.getCsrf()
                };
                const url = `/api/dashboard/responsibility/store`;
                Civilresponsibilitypolicieservice.setStore(url, formData)
                Appservice.getMessage('Se ha guardado correctamente', '/dashboard/vehiculos/documentos/polizas-de-responsabilidad-civil')
                return false;
            }
        })

        function getItens() {
            const __Policytype = [];
            const __Policynumber = [];
            let contractual = []
            let extracontractual = []

            let cpExpeditiondate = document.getElementById("cpExpeditiondate").value;
            let cpStartdatevalidity = document.getElementById("cpStartdatevalidity").value;
            let cpExpirationdate = document.getElementById("cpExpirationdate").value;
            let inId = document.getElementById("inId").value;
            let cpTakerdocumentnumber = document.getElementById("cpTakerdocumentnumber").value;
            let veId = document.getElementById("veId").value;
            let cpPolicytype = document.getElementsByName('cpPolicytype[]');
            let cpPolicynumber = document.getElementsByName('cpPolicynumber[]');
            //
            for (let i = 0; i < cpPolicytype.length; i++) {
                let item = cpPolicytype[i];
                __Policytype[i] = item.value;
            }
            //
            for (let i = 0; i < cpPolicynumber.length; i++) {
                let iten = cpPolicynumber[i];
                __Policynumber[i] = iten.value;
            }
            contractual.push(__Policynumber[0], __Policytype[0])
            extracontractual.push(__Policynumber[1], __Policytype[1])

            let itens = [cpExpeditiondate, cpStartdatevalidity, cpExpirationdate, inId, cpTakerdocumentnumber, veId, contractual, extracontractual];
            return itens;
        }

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
