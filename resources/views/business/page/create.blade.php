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
                    <form class="form-sample" id="AddForm" name="AddForm">
                        <div class="card mb-3">
                            <div class="card-body">
                                @csrf
                                <div class="row pb-3">
                                    <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <label class="col-form-label" for="nit">NIT</label>
                                        <input type="text" class="form-control nit" name="nit" id="nit" value=""
                                               autocomplete="off" required>
                                    </div>
                                    <div class="col-12 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                                        <label class="col-form-label" for="digit">Digito</label>
                                        <input type="text" class="form-control digit" name="digit" id="digit" value=""
                                               autocomplete="off" required>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <label class="col-form-label" for="businessName">Nombre / Razón social</label>
                                        <input type="text" class="form-control businessName" name="businessName"
                                               id="businessName" value="" autocomplete="off" required>
                                    </div>
                                    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                        <label class="col-form-label" for="typePerson">Tipo de persona</label>
                                        <select class="form-select typePerson" name="typePerson" id="typePerson">
                                            <option value="">Seleccione....</option>
                                            <option value="NACIONAL - NATURAL">NACIONAL - NATURAL</option>
                                            <option value="NACIONAL - JURÍDICA">NACIONAL - JURÍDICA
                                            </option>
                                            <option value="EXTRANJERA">EXTRANJERA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                        <label class="col-form-label" for="acronym">Sigla</label>
                                        <input type="text" class="form-control acronym" name="acronym" id="acronym"
                                               value="" autocomplete="off">
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <label class="col-form-label" for="nationalPersontype">Tipo persona Nacional -
                                            Jurídica</label>
                                        <select class="form-select nationalPersontype" name="nationalPersontype"
                                                id="nationalPersontype">
                                            <option value="">Seleccione....</option>
                                            <option value="PÚBLICA">PÚBLICA</option>
                                            <option value="PRIVADA">PRIVADA</option>
                                            <option value="MIXTA">MIXTA</option>
                                            <option value="INVERSIÓN EXTRANJERA">INVERSIÓN EXTRANJERA</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                        <label class="col-form-label" for="typesSociety">Tipo de sociedad </label>
                                        <select class="form-select typesSociety" name="typesSociety" id="typesSociety">
                                            <option value="">Seleccione....</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-2">
                                        <label class="col-form-label" for="economicSector">Sector económico</label>
                                        <input type="text" class="form-control economicSector" name="economicSector"
                                               id="economicSector" value="" autocomplete="off" required>
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <label class="col-form-label" for="department">Departamento </label>
                                        <select class="form-select department" name="department" id="department">
                                            <option value="">Seleccione....</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <label class="col-form-label" for="city">Ciudad</label>
                                        <select class="form-select city" name="city" id="city">
                                            <option value="">Seleccione....</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <label class="col-form-label" for="codeFuec">Codigo Fuec</label>
                                        <input type="text" class="form-control codeFuec" name="codeFuec"
                                               id="tcCodeFuec" value="" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <label class="col-form-label" for="telephone">Teléfono</label>
                                        <input type="text" class="form-control telephone" name="telephone"
                                               id="tcTelephone" value="" autocomplete="off" required>
                                    </div>
                                    <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <label class="col-form-label" for="phone">Celular</label>
                                        <input type="text" class="form-control phone" name="phone" id="phone"
                                               value="" autocomplete="off" required>
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <label class="col-form-label" for="direction">Dirección</label>
                                        <input type="text" class="form-control direction" name="direction"
                                               id="tcDirection" value="" autocomplete="off" required>
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <label class="col-form-label" for="email">Correo electrónico</label>
                                        <input type="text" class="form-control email" name="email" id="email"
                                               value="" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row pb-3">
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <label class="col-form-label" for="typeDocuments">Tipo de documento</label>
                                        <select class="form-select typeDocuments" name="typeDocuments"
                                                id="typeDocuments">
                                            <option value="">Seleccione....</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <label class="col-form-label" for="document">No de documento</label>
                                        <input type="text" class="form-control document" name="document" id="document"
                                               value=""
                                               autocomplete="off" required>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <label class="col-form-label" for="names">Nombre del representarle
                                            legal</label>
                                        <input type="text" class="form-control names" name="names"
                                               id="names" value="" autocomplete="off" required>
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
                            </div>
                        </div>
                    </form>
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
        requestService.Index(`/api/helpers/types-society`).then(function (data) {
            $.each(data, function (id, value) {
                let html = `<option value="${value.id}">${value.attributes.name} ${value.attributes.prefix}</option>`
                $('.typesSociety').append(html)
            });
        });

        /* Obtenemos el listado de los tipos de sociedad */
        requestService.Index(`/api/helpers/type-documents`).then(function (data) {
            $.each(data, function (id, value) {
                let html = `<option value="${value.id}">${value.attributes.name} - ${value.attributes.prefix}</option>`
                $('.typeDocuments').append(html)
            });
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
                    nit: "required",
                    digit: "required",
                    businessName: "required",
                    typePerson: "required",
                    acronym: "required",
                    nationalPersontype: "required",
                    typesSociety: "required",
                    economicSector: "required",
                    department: "required",
                    city: "required",
                    codeFuec: "required",
                    phone: "required",
                    direction: "required",
                    email: "required",
                    document: "required",
                    typeDocuments: "required",
                    names: "required",
                },
                messages: {
                    nit: "Este campo es requerido",
                    digit: "Este campo es requerido",
                    businessName: "Este campo es requerido",
                    typePerson: "Este campo es requerido",
                    acronym: "Este campo es requerido",
                    nationalPersontype: "Este campo es requerido",
                    typesSociety: "Este campo es requerido",
                    economicSector: "Este campo es requerido",
                    department: "Este campo es requerido",
                    city: "Este campo es requerido",
                    codeFuec: "Este campo es requerido",
                    phone: "Este campo es requerido",
                    direction: "Este campo es requerido",
                    email: "Este campo es requerido",
                    typeDocuments: "Este campo es requerido",
                    document: "Este campo es requerido",
                    names: "Este campo es requerido"
                }
            });
        });


    </script>
@endsection
