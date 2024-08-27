@extends('layouts.auth_app')
@section('title')
    Iniciar sesión
@endsection
@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{ asset('/assets/images/logo12.png') }}" alt="logo">
              </div>
              <h4>¡Hola! empecemos</h4>
                <h6 class="fw-light">Inicia sesión para continuar.</h6>
              <form class="pt-3" id="AddForm">
                @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li><small>{{ $error }}</small></li>
                                    @endforeach
                            </ul>
                        </div>
                    @endif
                <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg"
                        id="exampleInputEmail1"
                    placeholder="Nombre de usuario" value="test@example.com">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg"
                    id="exampleInputPassword1" placeholder="Contraseña" value="1100688704">
                </div>
                <div class="mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">
                        INICIAR SESIÓN 
                    </button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <label class="form-check-label text-muted">
                            <input type="checkbox" class="form-check-input"> Mantenme conectado </label>
                    </div>
                    <a href="#" class="auth-link text-black">¿Olvidó la contraseña?</a>
                </div>
                
              </form>
              <div id="messages"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
@endsection
@section('scripts')
    <script type="module">
        import Authenticate from '/services/authenticate/auth.service.js'
        /* Validamos el formulario */

        /* Funcion que envia el post */
        $.validator.setDefaults({
            submitHandler: function () {
                let formData = {};
                $("#AddForm").serializeArray().map(function (x) {
                    formData[x.name] = x.value;
                });
                const url = `/api/authenticate/login`;
                Authenticate.setAuthenticate(url, formData);
                return false;
            }
        })

        $(document).ready(function () {
            $("#AddForm").validate({
                rules: {
                    email: "required",
                    password: "required"
                },
                messages: {
                    email: "Este campo es requerido",
                    password: "Este campo es requerido"
                }
            });
        });
    </script>
@endsection
