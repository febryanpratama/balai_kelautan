<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from admin.pixelstrap.com/zeta/theme/sign-up-one.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Sep 2023 12:26:22 GMT -->
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Zeta admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
      <meta name="keywords" content="admin template, Zeta admin template, dashboard template, flat admin template, responsive admin template, web app">
      <meta name="author" content="pixelstrap">
      <link rel="icon" href="{{ asset('') }}assets/images/logo/favicon-icon.png" type="image/x-icon">
      <link rel="shortcut icon" href="{{ asset('') }}assets/images/logo/favicon-icon.png" type="image/x-icon">
      <title>Zeta admin dashboard </title>
      <!-- Google font-->
      <link rel="preconnect" href="https://fonts.googleapis.com/">
      <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
      <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/vendors/font-awesome.css">
      <!-- ico-font-->
      <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/vendors/icofont.css">
      <!-- Themify icon-->
      <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/vendors/themify.css">
      <!-- Flag icon-->
      <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/vendors/flag-icon.css">
      <!-- Feather icon-->
      <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/vendors/feather-icon.css">
      <!-- Plugins css start-->
      <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/vendors/sweetalert2.css">
      <!-- Plugins css Ends-->
      <!-- Bootstrap css-->
      <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/vendors/bootstrap.css">
      <!-- App css-->
      <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/style.css">
      <link id="color" rel="stylesheet" href="{{ asset('') }}assets/css/color-1.css" media="screen">
      <!-- Responsive css-->
      <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/responsive.css">
   </head>
   <body>
      <!-- Loader starts-->
      <div class="loader-wrapper">
         <div class="loader">
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-ball"></div>
         </div>
      </div>
      <!-- Loader ends-->
      <!-- page-wrapper Start-->
      <section>
         <div class="container-fluid p-0">
            <div class="row m-0">
               <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{ asset('') }}assets/images/login/3.jpg" alt="looginpage"></div>
               <div class="col-xl-7 p-0">
                  <div class="login-card">
                     <form class="theme-form login-form" method="POST" action="{{ url('auth/register') }}">
                        @csrf
                        <h4>Create your account</h4>
                        <h6>Enter your personal details to create account</h6>
                        <div class="form-group">
                           <label>Your Name</label>
                           <div class="input-group"><span class="input-group-text"><i class="icon-user"></i></span>
                              <input class="form-control" type="text" name="name" required="" placeholder="CV Tengkuang Onet">
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Email Address</label>
                           <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                              <input class="form-control" type="email" name="email" required="" placeholder="Test@gmail.com">
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Password</label>
                           <div class="input-group">
                              <span class="input-group-text"><i class="icon-lock"></i></span>
                              <input class="form-control" type="password" name="password" required="" placeholder="*********">
                              <div class="show-hide"><span class="show"></span></div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="checkbox">
                              <input id="checkbox1" type="checkbox">
                              <label class="text-muted" for="checkbox1">Agree with <span>Privacy Policy                   </span></label>
                           </div>
                        </div>
                        <div class="form-group">
                           <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                        </div>
                        <p>Already have an account?<a class="ms-2" href="{{ url('login') }}">Sign in</a></p>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- page-wrapper end-->
      <!-- latest jquery-->
      <script src="{{ asset('') }}assets/js/jquery-3.5.1.min.js"></script>
      <!-- Bootstrap js-->
      <script src="{{ asset('') }}assets/js/bootstrap/bootstrap.bundle.min.js"></script>
      <!-- feather icon js-->
      <script src="{{ asset('') }}assets/js/icons/feather-icon/feather.min.js"></script>
      <script src="{{ asset('') }}assets/js/icons/feather-icon/feather-icon.js"></script>
      <!-- scrollbar js-->
      <!-- Sidebar jquery-->
      <script src="{{ asset('') }}assets/js/config.js"></script>
      <!-- Plugins JS start-->
      <script src="{{ asset('') }}assets/js/sweet-alert/sweetalert.min.js"></script>
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="{{ asset('') }}assets/js/script.js"></script>
      <!-- login js-->
      <!-- Plugin used-->
      <script>
      $(document).ready(function() {
        // $('#example').DataTable();

        @if (session('success'))
        Swal.fire(
          'Great !',
          '{{ \App\Helpers\Format::messages(session("success")) }}',
          'success'
        )
        // swal("Great !", "{{ session('success') }}", "success");
        @endif ()
        
        @if (session('errors'))
        Swal.fire(
          'Oh No !',
          '{{ \App\Helpers\Format::messages(session("errors")) }}',
          'error'
        )
        // swal("Oh No !", "{{ session('errors') }}", "errors");
        @endif ()

      });
    </script>
   </body>
   <!-- Mirrored from admin.pixelstrap.com/zeta/theme/sign-up-one.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Sep 2023 12:26:22 GMT -->
</html>