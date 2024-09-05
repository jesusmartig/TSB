@extends('layouts.app')
@section('title')
    Actualizar convenios de colaboración
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-xl-12">
                            <div class="text-xl-end mt-xl-0 mt-1">
                                <a role="button" href="/dashboard/vehiculos/documentos/convenios"
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
                                    <label class="form-label">Tipo de convenio </label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="coTypeagreement"
                                                   id="coTypeagreement" value="1"
                                                   class="selectgroup-input coTypeagreement">
                                            <span
                                                class="selectgroup-button">POR PRÉSTAMOS</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="coTypeagreement"
                                                   id="coTypeagreement" value="2"
                                                   class="selectgroup-input coTypeagreement2">
                                            <span class="selectgroup-button">EN TRAMITES</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="coTypeagreement"
                                                   id="coTypeagreement" value="3"
                                                   class="selectgroup-input coTypeagreement3">
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
                                    <label for=coExpeditiondate">Fecha de expedición </label>
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
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <label for="veId">Vehículo </label>
                                    <select name="veId" class="veId form-control" id="veId" required></select>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <label for=colegallyrepresentative">Representante
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
                            <div class="row">
                                @role('ADMINISTRADOR')
                                <div class="row pb-3">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label for="soShares">PDF</label>
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
                                    </div>
                                </div>
                                @else
                                    <div class="row pb-3">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-group">
                                                <label for="soShares">PDF</label>
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
                                        </div>
                                    </div>
                                    @endrole
                            </div>

                            <div class="text-xl-end mt-xl-0 mt-1">
                                <div class="ms-auto">
                                    <a role="button"
                                       class="btn btn-sm btn-primary btn-tool primary-color float-right rounded-pill"
                                       href="/dashboard/vehiculos/documentos/convenios">
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
        import AccountantsService from '/services/accountants/accountants.service.js'
        import ConventionsService from '/services/conventions/conventions.service.js'

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
                $('.directory').val(`${vehicles.username}/vehiculos/${vehicles.veVehicleplate}/convenios `);
            })
        });

        /* Obtenemos los datos del formulario */
        ConventionsService.getShow(`/api/dashboard/conventions/show/${Appservice.getAllGetParams(5)}`).then(function (conventions) {
            if (conventions.coTypeagreement == 1) {
                document.querySelector('.coTypeagreement').checked = true;
            } else if (conventions.coTypeagreement == 2) {
                document.querySelector('.coTypeagreement2').checked = true;
            } else if (conventions.coTypeagreement == 3) {
                document.querySelector('.coTypeagreement3').checked = true;
            }


            $('#coCollaboratingcompany').val(conventions.coCollaboratingcompany);
            $('#coNitcollaboratingcompany').val(conventions.coNitcollaboratingcompany);
            $('#coAgreementNo').val(conventions.coAgreementNo);
            $('#coExpeditiondate').val(conventions.coExpeditiondate);
            $('#coExpirationdate').val(conventions.coExpirationdate);
            $('#colegallyrepresentative').val(conventions.colegallyrepresentative);
            $('#coIdentificationNo').val(conventions.coIdentificationNo);
            $('.select2').val(conventions.veId).trigger("change");
            $('#ocShares').val(conventions.ocShares);

        })

        //Obtenemos la url de la del documento a subir
        $("#Shares").change(function (e) {
            const url = `/api/dashboard/upload`;
            ConventionsService.setUpload(url, e)
        });

        /* Funcion que envia el post */
        $.validator.setDefaults({
            submitHandler: function () {
                const formData = Appservice.getData()
                const url = `/api/dashboard/conventions/update/${Appservice.getAllGetParams(5)}`;
                ConventionsService.setUpdate(url, formData)
                Appservice.getMessage('Se ha actualizado correctamente', '/dashboard/vehiculos/documentos/convenios')
                return false;
            }
        })

        /* Validamos el formulario */
        $(document).ready(function () {
            $("#AddForm").validate({
                rules: {
                    coTypeagreement: "required",
                    coCollaboratingcompany: "required",
                    coNitcollaboratingcompany: "required",
                    coAgreementNo: "required",
                    coExpeditiondate: "required",
                    coExpirationdate: "required",
                    colegallyrepresentative: "required",
                    coIdentificationNo: "required",
                    veId: "required",
                },
                messages: {
                    coTypeagreement: "Este campo es requerido",
                    coCollaboratingcompany: "Este campo es requerido",
                    coNitcollaboratingcompany: "Este campo es requerido",
                    coAgreementNo: "Este campo es requerido",
                    coExpeditiondate: "Este campo es requerido",
                    coExpirationdate: "Este campo es requerido",
                    colegallyrepresentative: "Este campo es requerido",
                    coIdentificationNo: "Este campo es requerido",
                    veId: "Este campo es requerido",
                }
            });


            $('.veId').select2();
        });

    </script>
@endsection
