@extends('layouts.app')
@section('title')
    Actulizar clientes
@endsection
@section('content')
<div class="row">
    <h3>Actualizar Cliente</h3>
    <div class="col-sm-12">
        <div class="home-tab">
            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist"></ul>
                <div>
                    <div class="btn-wrapper">
                        <a href="/dashboard/empresa-de-transporte/crear" class="btn btn-primary text-white me-0"><i
                                class="icon-download"></i> Crear Cliente</a>
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
                                <a role="button" href="/dashboard/clientes/"
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
                                <div class="col-12 col-sm-9 col-md-6 col-lg-4 col-xl-6 agr">
                                    <label class="col-form-label" for="typePerson">Tipo de persona</label>
                                    <select class="form-select typePerson" name="typePerson" id="tctypePerson">
                                        <option value="">Seleccione....</option>
                                        <option value="NACIONAL - NATURAL">NACIONAL - NATURAL</option>
                                        <option value="NACIONAL - JURÍDICA">NACIONAL - JURÍDICA</option>
                                        <option value="EXTRANJERA">EXTRANJERA</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-6">
                                    <label for="typeDocument">Tipo documento</label>
                                    <select class="form-select typeDocument" name="typeDocument"
                                            id="typeDocument" required>
                                        <option value="">Seleccioné...</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-4 col-md-3 col-lg-4 col-xl-4">
                                    <label for="numDocument">Documento</label>
                                    <input type="text" class="form-control numDocument" name="numDocument"
                                           id="numDocument"
                                           autocomplete="off" value="" required>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label for="expeditionDate">Fecha de expedición</label>
                                    <input type="date" class="form-control expeditionDate"
                                           name="expeditionDate"
                                           id="expeditionDate" autocomplete="off" value="" required>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label for="expeditionPlace">Lugar de expedición</label>
                                    <input type="text" class="form-control expeditionPlace"
                                           name="expeditionPlace"
                                           id="expeditionPlace" autocomplete="off" value="">
                                </div>
                                
                            </div>
                            <div class="row pb-3">
                                
                                
                                <div class="col-12 col-sm-4 col-md-9 col-lg-9 col-xl-12">
                                    <label for="name">Nombre / Razón social</label>
                                    <input type="text" class="form-control name" name="name" id="name"
                                           autocomplete="off" value="" required>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-4 col-xl-4">
                                    <label for="departament">Departamento </label>
                                    <select class="form-select select2 department" name="department"
                                            id="department" required>
                                        <option value="">Seleccioné...</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-4 col-md-12 col-lg-4 col-xl-4">
                                    <label for="city">Ciudad </label>
                                    <select class="form-select select2 city" name="ciId" id="city" required
                                    >
                                        <option value="">Seleccioné...</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-4 col-md-12 col-lg-4 col-xl-4">
                                    <label for="address">Dirección</label>
                                    <input type="text" class="form-control address" name="address"
                                           id="address"
                                           autocomplete="off" value="" required>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-12 col-sm-4 col-md-2 col-lg-4 col-xl-2">
                                    <label for="gender">Sexo</label>
                                    <select class="form-select gender" name="gender"
                                            id="gender" required>
                                        <option value="">Seleccioné...</option>
                                        <option value="M">MASCULINO</option>
                                        <option value="F">FEMENINO</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-5">
                                    <label for="email">E-mail </label>
                                    <input type="text" class="form-control email" name="email" id="email"
                                           autocomplete="off"
                                           value="" required>
                                </div>
                                <div class="col-12 col-sm-4 col-md-3 col-lg-4 col-xl-5">
                                    <label for="telephone">Teléfono</label>
                                    <input type="text" class="form-control telephone" name="telephone"
                                           id="telephone"
                                           autocomplete="off"
                                           value="">
                                </div>
                                
                            </div>
                            <div class="row pb-3">
                                
                                <div class="col-12 col-sm-4 col-md-3 col-lg-4 col-xl-6">
                                    <label for="cellphone">Celular</label>
                                    <input type="text" class="form-control cellphone" name="cellphone"
                                           id="cellphone"
                                           autocomplete="off"
                                           value="" required>
                                </div>
                                <div class="col-12 col-sm-9 col-md-6 col-lg-1 col-xl-6">
                                    <label class="col-form-label" for="typeIVA">Tipo de regimen IVA</label>
                                    <select class="form-select typeIVA" name="typeIVA" id="tctypeIVA">
                                        <option value="">Seleccione....</option>
                                        <option value="No_IVA">No Resposable de IVA</option>
                                        <option value="IVA">Resposable de IVA </option>
                                    </select>
                                </div>
                                <div >
                                    <h4> Retiene ICA</h4>
                                    <input type="radio" class="ICA" name="ICA"
                                           id="tcICA_si" value="" required>
                                    <label for="ICA_si">SI</label>
                                    <input type="radio" class="ICA" name="ICA"
                                           id="tcICA_no" value="" required>
                                    <label for="ICA_no">NO</label>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-4 col-xl-6">
                                    <label for="SharesDoc">Adjunte su documento de identificación</label>
                                    <input type="file" class="form-control SharesDoc" name="SharesDoc"
                                           id="SharesDoc" value="" autocomplete="off" required>
                                    <input type="hidden" class="form-control directoryDoc" name="directoryDoc"
                                           id="directoryDoc" value="" autocomplete="off" required readonly>
                                    <input type="hidden" class="form-control dfSharesDoc" name="affShares[]"
                                           id="dfShares" value="" autocomplete="off" required>
                                </div>
                                <div class="col-12 col-sm-4 col-md-12 col-lg-4 col-xl-6">
                                    <label for="SharesRut">Adjunte su RUT</label>
                                    <input type="file" class="form-control SharesRut" name="SharesRut"
                                           id="SharesRut"
                                           value=""
                                           autocomplete="off" required>
                                    <input type="hidden" class="form-control directoryRut" name="directoryRut"
                                           id="directoryRut" value="" autocomplete="off" required>
                                    <input type="hidden" class="form-control dfSharesRut" name="affShares[]"
                                           id="dfShares" value=""
                                           autocomplete="off" required>
                                </div>
                            </div>
                            <div class="row">
                                @role('ADMINISTRADOR')
                                <div class="row pb-3">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <input type="hidden" class="form-control usId" name="usId" id="usId"
                                               value="{{\Illuminate\Support\Facades\Auth::user()->id}}" required
                                               readonly>
                                    </div>
                                </div>
                                @else
                                    <div class="row pb-3">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label for="usId">Empresas de transporte</label>
                                            <select class="form-control usId transport-companies" name="usId"
                                                    id="usId" style="width: 100%" required>
                                                <option value="">Seleccioné...</option>
                                            </select>
                                        </div>
                                    </div>
                                    @endrole
                            </div>
                            <div class="text-xl-end mt-xl-0 mt-1">
                                <div class="ms-auto">
                                    <a role="button"
                                       class="btn btn-sm btn-primary btn-tool primary-color float-right rounded-pill"
                                       href="/dashboard/clientes/">
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
        import DepartmentsService from '/services/departments/departments.service.js'
        import CitiesService from '/services/cities/cities.service.js'
        import Transportcompanyservice from '/services/transportcompany/transportcompany.service.js'
        import DocumenttypeService from '/services/documenttype/documenttype.service.js'
        import AffiliatesService from '/services/affiliates/affiliates.service.js'

        /* Obtenemos el listado de las empresas de transporte */
        Transportcompanyservice.getIndex(`/api/dashboard/transportcompanies`).then(function (transportcompanies) {
            $.each(transportcompanies, function (id, value) {
                let html = `<option value="${value.usId}">${value.tcBusinessname}</option>`
                $('.transport-companies').append(html)
            });
        })

        /* Obtenemos el listado de los tipos de documentos */
        DocumenttypeService.getIndex(`/api/dashboard/document-type`).then(function (typedocuments) {
            $.each(typedocuments, function (id, value) {
                let html = `<option value="${value.dtId}">${value.dtName}</option>`
                $('.dtId').append(html)
            });
        })


        /* Obtenemos el listado de los departamentos */
        DepartmentsService.getIndex(`/api/dashboard/departments`).then(function (departments) {
            $.each(departments, function (id, value) {
                let html = `<option value="${value.deCode}">${value.deDepartments}</option>`
                $('.deId').append(html)
            });
        })

        /* Obtenemos el listado de las ciudades segun su departamento */
        $(".deId").change(function (e) {
            let deId = $('.deId').val();
            CitiesService.getShow(`/api/dashboard/cities/departments/${deId}`).then(function (cities) {
                $(".ciId").find("option").remove();
                $.each(cities, function (id, value) {
                    $(".ciId").append('<option value="' + value.ciId + '">' + value.ciCities + "</option>");
                });
            })
        });

        /* Obtenemos los valores del formulario */
        AffiliatesService.getShow(`/api/dashboard/affiliates/show/${Appservice.getAllGetParams(3)}`).then(function (affiliates) {

            $('.dtId').val(affiliates.dtId);
            $('#afDocument').val(affiliates.afDocument);

            if (affiliates.afDigits == null) {
                $("#afDigits").prop('disabled', true)
            } else {
                $("#afDigits").prop('disabled', false)
                $('#afDigits').val(affiliates.afDigits)
            }

            $('#afExpeditionplace').val(affiliates.afExpeditionplace);
            $('#afExpeditiondate').val(affiliates.afExpeditiondate);
            $('#afNames').val(affiliates.afNames);
            $('#afSurnames').val(affiliates.afSurnames);
            $('#afGender').val(affiliates.afGender);
            $('.deId').val(affiliates.deId);

            $('#afAddress').val(affiliates.afAddress);
            $('#afEmail').val(affiliates.afEmail);
            $('#afTelephone').val(affiliates.afTelephone);
            $('#afCellphone').val(affiliates.afCellphone);

            CitiesService.getShow(`/api/dashboard/cities/departments/${affiliates.deId}`).then(function (cities) {
                $(".ciId").find("option").remove();
                $.each(cities, function (id, value) {
                    $(".ciId").append('<option value="' + value.ciId + '">' + value.ciCities + "</option>");
                });
                $('#ciId').val(affiliates.ciId);
            })

            $('#usId').val(affiliates.usId);
            $('#acId').val(affiliates.acId);


        });


        $(".dtId").change(function (e) {
            let dtId = $('.dtId').val();
            if (dtId == 2) {
                $("#afDigits").prop('disabled', false);
            } else {
                $("#afDigits").prop('disabled', true);
            }
        });


        /* Funcion que envia el post */
        $.validator.setDefaults({
            submitHandler: function () {
                const formData = Appservice.getData();
                const url = `/api/dashboard/affiliates/update/${Appservice.getAllGetParams(3)}`;
                AffiliatesService.setUpdate(url, formData)
                Appservice.getMessage('Se ha actualizado correctamente', '/dashboard/clientes')
                console.log(formData)
                return false;
            }
        })

        /* Validamos el formulario */
        $(document).ready(function () {
            $("#AddForm").validate({
                rules: {
                    dtId: "required",
                    afDocument: "required",
                    afExpeditionplace: "required",
                    afExpeditiondate: "required",
                    afFullname: "required",
                    deId: "required",
                    ciId: "required",
                    afAddress: "required",
                    afEmail: "required",
                    afTelephone: "required",
                    afCellphone: "required",
                    usId: "required",
                },
                messages: {
                    dtId: "Este campo es requerido",
                    afDocument: "Este campo es requerido",
                    afExpeditionplace: "Este campo es requerido",
                    afExpeditiondate: "Este campo es requerido",
                    afFullname: "Este campo es requerido",
                    deId: "Este campo es requerido",
                    ciId: "Este campo es requerido",
                    afAddress: "Este campo es requerido",
                    afEmail: "Este campo es requerido",
                    afTelephone: "Este campo es requerido",
                    afCellphone: "Este campo es requerido",
                    usId: "Este campo es requerido",
                }
            });
        });

    </script>
@endsection
