@extends('layouts.app')
@section('title')
    Perfil del cliente
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Clientes</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
                <h4 class="page-title">@yield('title')</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                        <li class="nav-item">
                            <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false"
                               class="nav-link rounded-0 active">
                                Perfil del vehículo
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="aboutme">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <table width="100%" border="1" cellpadding="2"
                                               style="font-size: 11px; text-align: center"
                                               class="table table-sm table-centered mb-0">
                                            <tr>
                                                <th>PLACA DEL VEHÍCULO</th>
                                                <th>NRO. DE LICENCIA DE TRÁNSITO</th>
                                                <th>TIPO DE SERVICIO</th>
                                                <th>CLASE DE VEHÍCULO</th>
                                                <th>No. INTERNO</th>
                                            </tr>
                                            <tr>
                                                <td>{{ $vehicles->veVehicleplate }}</td>
                                                <td>{{ $vehicles->veTransitlicensenumber }}</td>
                                                <td>{{ $vehicles->veTypeservice }}</td>
                                                <td>{{ $vehicles->vcClassname }}</td>
                                                <td>{{ $vehicles->vcInternalnumber }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            </div>

                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Información
                                general del vehículo</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <table width="100%" cellpadding="2"
                                               style="font-size: 11px; text-align: center"
                                               class="table table-sm table-centered mb-0">
                                            <tr>
                                                <th>MARCA</th>
                                                <th>LINEA</th>
                                                <th>MODELO</th>
                                                <th>CILINDRARE</th>
                                                <th>COLOR</th>
                                                <th>TIPO DE CARROCERÍA</th>
                                            </tr>
                                            <tr>
                                                <td>{{ $vehicles->brName }}</td>
                                                <td>{{ $vehicles->veLine }}</td>
                                                <td>{{ $vehicles->veModel }}</td>
                                                <td>{{ $vehicles->veCylindercapacity }}</td>
                                                <td>{{ $vehicles->veColor }}</td>
                                                <td>{{ $vehicles->veBodytype }}</td>
                                            </tr>
                                            <tr>
                                                <th>COMBUSTIBLE</th>
                                                <th>CAPACIDAD</th>
                                                <th>NÚMERO DE VIN</th>
                                                <th>NUMERO DE MOTOR</th>
                                                <th>NUMERO DE SERIE</th>
                                                <th>NUMERO DE CHASIS</th>
                                            </tr>
                                            <tr>
                                                <td>{{ $vehicles->fuName }}</td>
                                                <td>{{ $vehicles->vePassengercapacity }}</td>
                                                <td>{{ $vehicles->veVinnumber }}</td>
                                                <td>{{ $vehicles->veEnginenumber }}</td>
                                                <td>{{ $vehicles->veSerialnumber }}</td>
                                                <td>{{ $vehicles->veChassisnumber }}</td>
                                            </tr>
                                            <tr>
                                                <th colspan="3">FECHA MATRICULA</th>
                                                <th colspan="3">AUTORIDAD DE TRÁNSITO</th>
                                            </tr>
                                            <tr>
                                                <td colspan="3">{{ $vehicles->veInitialenrollmentdate }}</td>
                                                <td colspan="3">{{ $vehicles->veTransitauthority }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            </div> <!-- end row -->

                            <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                    class="mdi mdi-office-building me-1"></i> Poliza SOAT</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <table width="100%" cellpadding="2"
                                               style="font-size: 11px; text-align: center"
                                               class="table table-sm table-centered mb-0">
                                            <tr>
                                                <th>NO DE PÓLIZA FECHA</th>
                                                <th>EXPEDICIÓN</th>
                                                <th>FECHA INICIO DE VIGENCIA</th>
                                                <th>FECHA FIN DE VIGENCIA</th>
                                                <th>CÓDIGO TARIFA</th>
                                                <th>ENTIDAD EXPIDE SOAT</th>
                                            </tr>
                                            @foreach($soatpolicy as $soat)
                                                <tr>
                                                    <td>{{ $soat->soPolicynumber }}</td>
                                                    <td>{{ $soat->soExpeditiondate }}</td>
                                                    <td>{{ $soat->soStartdatevalidity }}</td>
                                                    <td>{{ $soat->soExpirationdate }}</td>
                                                    <td>{{ $soat->soRatetype }}</td>
                                                    <td>{{ $soat->inInsurername }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end row -->

                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i> Pólizas de
                                Responsabilidad Civil
                            </h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <table width="100%" border="1" cellpadding="2"
                                               style="font-size: 11px; text-align: center"
                                               class="table table-sm table-centered mb-0">
                                            <tr>
                                                <th>NO DE PÓLIZA FECHA</th>
                                                <th>EXPEDICIÓN</th>
                                                <th>FECHA INICIO DE VIGENCIA</th>
                                                <th>FECHA FIN DE VIGENCIA</th>
                                                <th>ENTIDAD EXPIDE</th>
                                                <th>TIPO DE PÓLIZA</th>
                                            </tr>
                                            @if($civilresponsibilitypolicies === null)
                                                <tr>
                                                    <td></td>
                                                </tr>
                                            @else
                                                @foreach($civilresponsibilitypolicies as $policies)
                                                    <tr>
                                                        <td>{{$policies->cpPolicynumber}}</td>
                                                        <td>{{$policies->cpExpeditiondate}}</td>
                                                        <td>{{$policies->cpStartdatevalidity}}</td>
                                                        <td>{{$policies->cpExpirationdate}}</td>
                                                        <td>{{$policies->inInsurername}}</td>
                                                        @if($policies->cpPolicytype === 'Responsabilidad Civil Contractual')
                                                            <td>RCC</td>
                                                        @else
                                                            <td>RCE</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </table>
                                    </div>
                                </div>

                            </div> <!-- end row -->

                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i> Certificado
                                de revisión técnico mecánica y de emisiones contaminantes (RTM)
                            </h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <table width="100%" border="1" cellpadding="2"
                                               style="font-size: 11px; text-align: center"
                                               class="table table-sm table-centered mb-0">
                                            <tr>
                                                <th>TIPO REVISIÓN</th>
                                                <th>FECHA EXPEDICIÓN</th>
                                                <th>FECHA VIGENCIA</th>
                                                <th>CDA EXPIDE RTM</th>
                                                <th>NRO. CERTIFICADO</th>
                                            </tr>
                                            @if($mechanicaltechnicalreview === null)
                                                <tr>
                                                    <td colspan="5">{{ 'No se encontró información registrada en el RUNT.' }}</td>
                                                </tr>
                                            @else
                                                @foreach($mechanicaltechnicalreview as $rtm)
                                                    <tr>
                                                        <td>{{ $rtm->rtmRevisiontype }}</td>
                                                        <td>{{ $rtm->rtmExpeditiondate }}</td>
                                                        <td>{{ $rtm->rtmEffectivedate }}</td>
                                                        <td>{{ $rtm->rtmCdaissuesrtm }}</td>
                                                        <td>{{ $rtm->rtmCertificate }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end row -->

                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i> Solicitudes
                            </h5>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <table width="100%" cellpadding="2"
                                               style="font-size: 11px; text-align: center"
                                               class="table table-sm table-centered mb-0">
                                            <tr>
                                                <th>NRO. DE SOLICITUD</th>
                                                <th>FECHA DE SOLICITUD</th>
                                                <th>ESTADO</th>
                                                <th>TRÁMITES</th>
                                                <th>ENTIDAD</th>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            </div> <!-- end row -->
                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i> Solicitudes
                            </h5>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <table width="100%" border="1" cellpadding="2"
                                               style="font-size: 11px; text-align: center"
                                               class="table table-sm table-centered mb-0">
                                            <tr>
                                                <th>EMPRESA AFILIADORA</th>
                                                <th>FECHA DE EXPEDICIÓN</th>
                                                <th>FECHA DE VENCIMIENTO</th>
                                                <th>NRO. TARJETA DE OPERACIÓN</th>
                                                <th>ESTADO</th>
                                            </tr>
                                            @foreach($operationcard as $operationcard)
                                                <tr>
                                                    <td>{{ $operationcard->ocAffiliatecompany }}</td>
                                                    <td>{{ $operationcard->ocExpeditiondate }}</td>
                                                    <td>{{ $operationcard->ocExpirationdate }}</td>
                                                    <td>{{ $operationcard->ocOperationcard }}</td>
                                                    @if($operationcard->ocStatus === 1)
                                                        <td>TARJETA DE OPERACIÓN ACTIVA</td>
                                                    @else
                                                        <td>TARJETA DE OPERACIÓN CANCELADA</td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end row -->

                        </div>
                        <!-- end timeline content-->

                        <div class="tab-pane" id="timeline">

                        </div>
                        <!-- end timeline content-->

                        <div class="tab-pane" id="settings">

                        </div>
                        <!-- end settings content-->

                    </div> <!-- end tab-content -->
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
@endsection
@section('scripts')
    <script type="module">
        import Appservice from '/services/app/app.service.js'
        import AffiliatesService from '/services/affiliates/affiliates.service.js'


        /* Obtenemos los valores para los datos del perfil */
        AffiliatesService.getShow(`/api/dashboard/affiliates/profile/${Appservice.getAllGetParams(3)}`).then(function (affiliates) {

            if (affiliates.afDigits == null) {
                $('#afDocument').html(`${affiliates.dtPrefix} ${affiliates.afDocument}`);
            } else {
                $('#afDocument').html(`${affiliates.dtPrefix} ${affiliates.afDocument} - ${affiliates.afDigits}`);
            }

            $('.afNames').html(`${affiliates.afNames} ${affiliates.afSurnames}`);

            $('#afGender').html(affiliates.afGender);
            $('#deDepartments').html(affiliates.deDepartments);
            $('#ciCities').html(affiliates.ciCities);

            $('#afAddress').html(affiliates.afAddress);
            $('#afEmail').html(affiliates.afEmail);
            if (affiliates.afTelephone == null) {
                $('#afTelephone').html(`${affiliates.afCellphone}`);
            } else {
                $('#afTelephone').html(`${affiliates.afTelephone} - ${affiliates.afCellphone}`);
            }


        });


    </script>
@endsection
