<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/img/favicon.ico">
  <link rel="icon" type="image/png" href="<?=base_url()?>assets/img/favicon.ico">
  <title>BODY EFFECT</title>
  <!-- Google Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link id="pagestyle" href="<?=base_url()?>/assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

<body>
  <main class="main-content vh-100 w-100">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('./assets/img/loginBk.jpg');">
      <span class="mask bg-gradient-dark-login opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-8 col-12 mx-auto">
            <div class="boxForm z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mb-5">
                <div class="w-90 mx-auto">
                  <img class="mw-100" src="<?= base_url()?>assets/img/logo.png">
                  <br>
                </div>
              </div>
              <div class="card-body card-login">
                <?=form_open(base_url().'Login/validateUser')?>
                  <div class="">
                    <input type="text" name="usuario" class="w-100 mb-4 py-2 px-3 rounded-pill border-0" placeholder="Usuario" required>
                  </div>
                  <div class="position-relative">
                    <input type="password" id="contrasena" name="contrasena" class="w-100 py-2 px-3 rounded-pill border-0" required>
                    <span typw="button" class="position-absolute" id="showPass" onclick="showPassword()">
                      <span class="material-symbols-outlined text-white">visibility_off</span>
                      <span class="material-symbols-outlined text-white" aria-hidden="true" style="display:none;">visibility</span>
                    </span>
                    <input id="id_usuario" name="id_usuario" type="hidden" class="form-control">
                  </div>
                  <div class="form-check form-switch d-flex justify-content-center justify-content-lg-between justify-content-xl-between my-3">
                    <div class="d-flex align-items-center d-none d-xl-flex d-lg-flex">
                      <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                      <label class="form-check-label mb-0 ms-3 text-white" for="rememberMe">Remember me</label>
                    </div>
                    <p class="m-0 form-check-label text-white" data-bs-toggle="tooltip" data-bs-placement="right" title="Reporta esto con el área de sistemas para recuprar o reasignar">¿Olvidaste tu contraseña?</p>
                  </div>
                  <div class="text-center">
                    <?=form_hidden('token',$token)?>
                    <button type="submit" class="bg-dark-login text-white w-100 my-4 mb-2 py-2 rounded-pill border-0">Ingresar</button>
                    <?=form_close()?>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
              <small>© <script>document.write(new Date().getFullYear())</script>, <b>Ciudad Maderas</b>, departamento de TI.</small>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://bodyeffect.com.mx/" class="nav-link text-white" target="_blank">bodyeffect.com.mx</a>
                </li> 
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="<?=base_url()?>assets/js/core/popper.min.js"></script>
  <script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?=base_url()?>assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    function showPassword(){
      if ($("#contrasena").attr("type") == "password") $("#contrasena").attr("type", "text");
      else $("#contrasena").attr("type", "password");    
      
      $("#showPass span").toggle();
    }
  </script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url()?>assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>