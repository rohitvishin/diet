<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">
  <script>
  const url = "{{ url('') }}";
  </script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-social/bootstrap-social.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script src="{{asset('assets/js/axios.min.js')}}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

  <body>
    <!-- Content -->

    <div class="container">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="row">
        <div class="col-md-6">
          <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
              <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center">
                  <a href="index.html" class="app-brand-link gap-2">
                    
                    <span class="app-brand-text demo text-body fw-bolder">Sneat</span>
                  </a>
                </div>
                <!-- /Logo -->
                <h4 class="mb-2">Welcome to Sneat!</h4>
  
                <form id="register" >
                  @csrf
                  <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input
                      type="text"
                      class="form-control"
                      id="username"
                      name="username"
                      placeholder="Enter your username"
                      autofocus
                    />
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" />
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" />
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile number" />
                  </div>
                  <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                      />
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                  </div>
  
                  <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Confirm Password</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="c_password"
                        class="form-control"
                        name="c_password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                      />
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                  </div>
                  <button class="btn btn-primary d-grid w-100">Sign up</button>
                </form>
  
                <p class="text-center">
                  <span>Already registered?</span>
                  <a href="{{route('login')}}">
                    <span>Login</span>
                  </a>
                </p>
              </div>
            </div>
            <!-- /Register -->
          </div>
        </div>
        </div>
      </div>
    </div>

    <!-- / Content -->
    <!-- Core JS -->
    @include('dev.include.footer')
    <script>
        $('#register').on('submit',function(e){
            e.preventDefault();
            axios.post(`${url}/client/register`,new FormData(this)).then(function (response) {
                    // handle success
                    show_Toaster(response.data.message,response.data.type)
                    if (response.data.type === 'success') {
                        setTimeout(() => {
                            window.location.href = `${url}/client/home`;
                        }, 500);
                    }
                }).catch(function (err) {
                    show_Toaster(err.response.data.message,'error')
            })
         });
        </script>
  </body>
</html>
