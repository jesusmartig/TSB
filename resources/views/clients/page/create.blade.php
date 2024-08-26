@extends('layouts.app')
@section('title')
    Crear clientes
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist"></ul>
                    <div>
                        <div class="btn-wrapper">
                            <a href="/dashboard/clientes" class="btn btn-primary text-white me-0">
                                <i class="fas fa-undo-alt me-1"></i>Regresar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="tab-content tab-content-basic">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <form class="form-sample" id="AddForm" name="AddForm">
                                    @csrf
                                    <div class="row pb-3">
                                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                            <label for="typeDocument">Tipo documento</label>
                                            <select class="form-select typeDocument" name="typeDocument"
                                                    id="typeDocument">
                                                <option value="">Seleccioné...</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                            <label for="numDocument">Documento</label>
                                            <input type="text" class="form-control numDocument" name="numDocument"
                                                   id="numDocument"
                                                   autocomplete="off" value="">
                                        </div>
                                        <div class="col-12 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                                            <label for="digit">Digito</label>
                                            <input type="text" class="form-control digit" name="digit"
                                                   id="digit"
                                                   autocomplete="off" value="" disabled>
                                        </div>
                                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                            <label for="expeditionPlace">Lugar de expedición</label>
                                            <input type="text" class="form-control expeditionPlace"
                                                   name="expeditionPlace"
                                                   id="expeditionPlace" autocomplete="off" value="">
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                            <label for="expeditionDate">Fecha de expedición</label>
                                            <input type="date" class="form-control expeditionDate"
                                                   name="expeditionDate"
                                                   id="expeditionDate" autocomplete="off" value="">
                                        </div>
                                        <div class="col-12 col-sm-4 col-md-9 col-lg-9 col-xl-9">
                                            <label for="name">Nombre / Razón social</label>
                                            <input type="text" class="form-control name" name="name" id="name"
                                                   autocomplete="off" value="" required>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <label for="departament">Departamento </label>
                                            <select class="form-select select2 department" name="department"
                                                    id="department">
                                                <option value="">Seleccioné...</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <label for="city">Ciudad </label>
                                            <select class="form-select select2 city" name="ciId" id="city"
                                            >
                                                <option value="">Seleccioné...</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <label for="address">Dirección</label>
                                            <input type="text" class="form-control address" name="address"
                                                   id="address"
                                                   autocomplete="off" value="">
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                            <label for="gender">Sexo</label>
                                            <select class="form-select gender" name="gender"
                                                    id="gender">
                                                <option value="">Seleccioné...</option>
                                                <option value="M">MASCULINO</option>
                                                <option value="F">FEMENINO</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                            <label for="email">E-mail </label>
                                            <input type="text" class="form-control email" name="email" id="email"
                                                   autocomplete="off"
                                                   value="">
                                        </div>
                                        <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                            <label for="telephone">Teléfono</label>
                                            <input type="text" class="form-control telephone" name="telephone"
                                                   id="telephone"
                                                   autocomplete="off"
                                                   value="">
                                        </div>
                                        <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                            <label for="cellphone">Celular</label>
                                            <input type="text" class="form-control cellphone" name="cellphone"
                                                   id="cellphone"
                                                   autocomplete="off"
                                                   value="">
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                            <label for="SharesDoc">Adjunte su documento de identificación</label>
                                            <input type="file" class="form-control SharesDoc" name="SharesDoc"
                                                   id="SharesDoc" value="" autocomplete="off" required>
                                            <input type="hidden" class="form-control directoryDoc" name="directoryDoc"
                                                   id="directoryDoc" value="" autocomplete="off" required readonly>
                                            <input type="hidden" class="form-control dfSharesDoc" name="affShares[]"
                                                   id="dfShares" value="" autocomplete="off" required>
                                        </div>
                                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
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
                                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                            <label for="SharesLive">Adjunte su hoja de vida</label>
                                            <input type="file" class="form-control SharesLive" name="SharesLive"
                                                   id="SharesLive" value="" autocomplete="off">
                                            <input type="hidden" class="form-control directoryLive" name="directoryLive"
                                                   id="directoryLive" value="" autocomplete="off">
                                            <input type="hidden" class="form-control dfSharesLive" name="affShares[]"
                                                   id="dfShares" value="" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="text-xl-end mt-xl-0 mt-1">
                                        <div class="ms-auto">
                                            <a role="button"
                                               class="btn btn-sm btn-primary text-white btn-tool primary-color rounded-pill float-right rounded-pill"
                                               href="/dashboard/empresa">
                                                <i class="fad fa-times me-1"> </i> Cancelar
                                            </a>
                                            <button type="submit"
                                                    class="btn btn-sm btn-success text-white btn-tool succ-coloress rounded-pill float-right rounded-pill">
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
        </div>
    </div>
@endsection
@section('scripts')
    <script type="module">
        import requestService from '/services/applications/App.service.js'
        import helpersService from '/services/applications/helpers.service.js'

        /* Obtenemos el listado de los departamento */
        requestService.Index(`/api/helpers/departments`).then(function (data) {
            $.each(data, function (id, value) {
                let html = `<option value="${value.id}">${value.attributes.department}</option>`
                $('.department').append(html)
            });
        });

        /* Obtenemos el listado de las ciudades segun su departamento */
        $(".department").change(function (e) {
            let department = $('.department').val();
            requestService.Index(`/api/helpers/cities/show/department/${department}`).then(function (data) {
                $(".city").find("option").remove();
                $.each(data, function (id, value) {
                    $(".city").append('<option value="' + value.id + '">' + value.attributes.cities + "</option>");
                });
            })
        });

        /* Obtenemos el listado de los tipos de sociedad */
        requestService.Index(`/api/helpers/type-documents`).then(function (data) {
            $.each(data, function (id, value) {
                let html = `<option value="${value.id}">${value.attributes.name} - ${value.attributes.prefix}</option>`
                $('.typeDocuments').append(html)
            });
        });

        $(".SharesDoc").change(function (e) {
            const url = `/api/dashboard/upload/doc`;
            Uploadservice.setUploadDoc(url, e)
        });


        $.validator.setDefaults({
            submitHandler: function () {
                let formData = {};
                $("#AddForm").serializeArray().map(function (x) {
                    formData[x.name] = x.value;
                });
                const url = `/api/dashboard/transport-companies/store`;
                requestService.Store(url, formData)
                helpersService.getMessage('Se ha guardado correctamente', '/dashboard/empresa-de-transporte')
                return false;
            }
        })


        /* Validamos el formulario */
        $(document).ready(function () {
            $("#AddForm").validate({
                rules: {
                    name: "required",
                    email: "required",
                    password: "required",
                    typeDocument: "required",
                    numDocument: "required",
                    digit: "required",
                    expeditionDate: "required",
                    expeditionPlace: "required",
                    departament: "required",
                    city: "required",
                    gender: "required",
                    address: "required",
                    telephone: "required",
                    cellphone: "required",
                    avatar: "required",
                    rol: "required",
                    transport: "required",
                },
                messages: {
                    name: "Este campo es requerido",
                    email: "Este campo es requerido",
                    password: "Este campo es requerido",
                    typeDocument: "Este campo es requerido",
                    numDocument: "Este campo es requerido",
                    digit: "Este campo es requerido",
                    expeditionDate: "Este campo es requerido",
                    expeditionPlace: "Este campo es requerido",
                    departament: "Este campo es requerido",
                    city: "Este campo es requerido",
                    gender: "Este campo es requerido",
                    address: "Este campo es requerido",
                    telephone: "Este campo es requerido",
                    cellphone: "Este campo es requerido",
                    avatar: "Este campo es requerido",
                    rol: "Este campo es requerido",
                    transport: "Este campo es requerido"
                }
            });
        });


    </script>
@endsection
