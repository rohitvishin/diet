<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>MARKETPLACE-LOGIN PAGE</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="marketplace for projects" name="description" />
        <meta content="teamname" name="author" />
        <!-- App favicon -->
        @include('dev/include/header')
    </head>

    <body class="auth-body-bg">
        <div class="home-btn d-none d-sm-block">
            <a href="index.html"><i class="mdi mdi-home-variant h2 text-white"></i></a>
        </div>
        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4">
                        <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                            <div class="w-100">
                                <div class="row justify-content-center">
                                    <div class="col-lg-9">
                                        <div>
                                            <div class="text-center">
                                                <div>
                                                    <a href="index.html" class="logo">
                                                        <img src="{{ asset('public/assets/images/logo-dark.png') }}" height="20" alt="logo"></a>
                                                </div>

                                                <h4 class="font-size-18 mt-4">Welcome</h4>
                                                <p class="text-muted">Sign in to continue to Marketplace.</p>
                                            </div>

                                            <div class="p-2 mt-5">
                                                <form id="login">
                                                    @csrf
                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                        <label for="username">Username</label>
                                                        <input type="text" class="form-control" name="username" placeholder="Enter username">
                                                    </div>

                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                        <label for="userpassword">Password</label>
                                                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                                                    </div>


                                                    <div class="mt-4 text-center">
                                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                                    </div>

                                                    <div class="mt-4 text-center">
                                                        <a href="" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="mt-5 text-center">
                                                <p>Don't have an account ? <a href="auth-register.html" class="fw-medium text-primary"> Register </a> </p>
                                                <p>© <script>document.write(new Date().getFullYear())</script> <i class="mdi mdi-heart text-danger"></i>Marketplace</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="authentication-bg">
                            <div class="bg-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        @include('dev/include/footer')
        
        <script>
        $('#login').on('submit',function(e){
            e.preventDefault();
            axios.post(`${url}/dev/login`,new FormData(this)).then(function (response) {
                    // handle success
                    show_Toaster(response.data.message,response.data.type)
                    if (response.data.type === 'success') {
                        setTimeout(() => {
                            window.location.href = `${url}/dev/home`;
                        }, 500);
                    }
                }).catch(function (err) {
                    show_Toaster(err.response.data.message,'error')
            })
         });
        </script>
        
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    </body>
</html>
