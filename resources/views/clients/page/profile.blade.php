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
                        <div class="row">
                            <div class="col-xl-4 col-lg-5">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}"
                                             class="rounded-circle avatar-lg img-thumbnail"
                                             alt="profile-image">

                                        <h5 class="mb-0 mt-2"><span class="afNames" id="afNames"></span></h5>
                                        <p class="text-muted font-14">CLIENTE</p>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->

                            </div> <!-- end col-->

                            <div class="col-xl-8 col-lg-7">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                            <li class="nav-item">
                                                <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false"
                                                   class="nav-link rounded-0 active">
                                                    PERFIL DEL CLIENTE
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="aboutme">
                                                <h5 class="mb-4 text-uppercase"><i
                                                            class="mdi mdi-account-circle me-1"></i> INFORMACIÓN
                                                    PERSONAL
                                                </h5>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="afDocument" class="form-label">Documento</label>
                                                            <span class="form-control afDocument"
                                                                  id="afDocument"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="mb-3">
                                                            <label for="afNames" class="form-label">Nombre / Razón
                                                                social</label>
                                                            <span class="form-control afNames"
                                                                  id="afNames"></span>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="deDepartments"
                                                                   class="form-label">Departamento </label>
                                                            <span class="deDepartments form-control"
                                                                  id="deDepartments"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ciCities"
                                                                   class="form-label">Ciudad</label>
                                                            <span class="ciCities form-control"
                                                                  id="ciCities"></span>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="afAddress" class="form-label">Dirección </label>
                                                            <span class="afAddress form-control" id="afAddress"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="afGender" class="form-label">Sexo</label>
                                                            <span class="afGender form-control" id="afGender"></span>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="afEmail" class="form-label">Dirección de
                                                                correo electrónico</label>
                                                            <span class="form-control afEmail" id="afEmail"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="afTelephone"
                                                                   class="form-label">Telefonos</label>
                                                            <span class="form-control afTelephone"
                                                                  id="afTelephone"></span>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->

                                            </div> <!-- end tab-pane -->
                                            <!-- end about me section content -->

                                            <div class="tab-pane" id="timeline">


                                            </div>
                                            <!-- end timeline content-->

                                            <div class="tab-pane" id="settings">
                                                <form>
                                                    <h5 class="mb-4 text-uppercase"><i
                                                                class="mdi mdi-account-circle me-1"></i> Personal Info
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="firstname" class="form-label">First
                                                                    Name</label>
                                                                <input type="text" class="form-control" id="firstname"
                                                                       placeholder="Enter first name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="lastname" class="form-label">Last
                                                                    Name</label>
                                                                <input type="text" class="form-control" id="lastname"
                                                                       placeholder="Enter last name">
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for="userbio" class="form-label">Bio</label>
                                                                <textarea class="form-control" id="userbio" rows="4"
                                                                          placeholder="Write something..."></textarea>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="useremail" class="form-label">Email
                                                                    Address</label>
                                                                <input type="email" class="form-control" id="useremail"
                                                                       placeholder="Enter email">
                                                                <span class="form-text text-muted"><small>If you want to change email please <a
                                                                                href="javascript: void(0);">click</a> here.</small></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="userpassword"
                                                                       class="form-label">Password</label>
                                                                <input type="password" class="form-control"
                                                                       id="userpassword" placeholder="Enter password">
                                                                <span class="form-text text-muted"><small>If you want to change password please <a
                                                                                href="javascript: void(0);">click</a> here.</small></span>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->

                                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                                                class="mdi mdi-office-building me-1"></i> Company Info
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="companyname" class="form-label">Company
                                                                    Name</label>
                                                                <input type="text" class="form-control" id="companyname"
                                                                       placeholder="Enter company name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="cwebsite" class="form-label">Website</label>
                                                                <input type="text" class="form-control" id="cwebsite"
                                                                       placeholder="Enter website url">
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->

                                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                                                class="mdi mdi-earth me-1"></i> Social</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="social-fb"
                                                                       class="form-label">Facebook</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                                class="mdi mdi-facebook"></i></span>
                                                                    <input type="text" class="form-control"
                                                                           id="social-fb" placeholder="Url">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="social-tw"
                                                                       class="form-label">Twitter</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                                class="mdi mdi-twitter"></i></span>
                                                                    <input type="text" class="form-control"
                                                                           id="social-tw" placeholder="Username">
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="social-insta"
                                                                       class="form-label">Instagram</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                                class="mdi mdi-instagram"></i></span>
                                                                    <input type="text" class="form-control"
                                                                           id="social-insta" placeholder="Url">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="social-lin"
                                                                       class="form-label">Linkedin</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                                class="mdi mdi-linkedin"></i></span>
                                                                    <input type="text" class="form-control"
                                                                           id="social-lin" placeholder="Url">
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="social-sky" class="form-label">Skype</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                                class="mdi mdi-skype"></i></span>
                                                                    <input type="text" class="form-control"
                                                                           id="social-sky" placeholder="@username">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="social-gh" class="form-label">Github</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                                class="mdi mdi-github"></i></span>
                                                                    <input type="text" class="form-control"
                                                                           id="social-gh" placeholder="Username">
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->

                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-success mt-2"><i
                                                                    class="mdi mdi-content-save"></i> Save
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- end settings content-->

                                        </div> <!-- end tab-content -->
                                    </div> <!-- end card body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
