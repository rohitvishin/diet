<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Register | Nazox - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap Css -->
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
                                                    <a href="index.html" class="logo"><img src="assets/images/logo-dark.png" height="20" alt="logo"></a>
                                                </div>

                                                <h4 class="font-size-18 mt-4">Welcome !</h4>
                                                <p class="text-muted">Sign up to continue to Nazox.</p>
                                            </div>

                                            <div class="p-2 mt-5">
                                                <form class="form-groupz" id="register">
                                                       @csrf
                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                        <label for="name">Fullname</label>
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Fullname" required>
                                                    </div>

                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                        <label for="username">Username</label>
                                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                                                    </div>

                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                        <label for="userpassword">Password</label>
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                                                    </div>
                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                        <label for="userpassword">Confirm Password</label>
                                                        <input type="password" class="form-control" id="c_password" name="c_password" placeholder="Enter password" required>
                                                    </div>
                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                        <label for="username">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                                                    </div>
                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                        <label for="username">Mobile</label>
                                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile" required>
                                                    </div>

                                                    <div class="mt-4 text-center">
                                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit" >Sign Up</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="mt-5 text-center">
                                                <p>Already have an account ? <a href="auth-register.html" class="fw-medium text-primary"> Login </a> </p>
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
            $('#register').on('submit',function(e) {
                e.preventDefault();
                axios.post(`${url}/dev/register`,new FormData(this))
                .then(function (response) {
                    // handle success
                    sweetalert(response.data.message,response.data.type)
                    if (response.data.type === 'success') {
                        setTimeout(() => {
                            window.location.href = `${url}/dev`;
                        }, 500);
                    }
                }).catch(function (err) {
                    sweetalert(err.response.data.message,'error')
                    })
            });
        </script>

    </body>
</html>
