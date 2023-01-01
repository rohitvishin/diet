@include('dev.include.header')

@include('dev.include.sidebar')

<!-- Main Content -->

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>My Profile</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-3">
                    <div class="card author-box card-primary">
                        <div class="card-body">
                            <div class="author-box-left">
                                <img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle author-box-picture">
                                <div class="clearfix"></div>
                            </div>
                            <div class="author-box-details">
                                <div class="author-box-name">
                                    <a href="#">{{Str::ucfirst($user->name)}}</a>
                                </div>
                                <div class="author-box-job">Diet Consultant</div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-9">
                    <div class="card">
                        <form id="profileForm" class="needs-validation" novalidate="">
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$user->name}}" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the first name
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Phone</label>
                                        <input type="tel" class="form-control" name="mobile" value="{{$user->mobile}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the email
                                        </div>
                                    </div>                                   
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>


<!-- Main Content -->


@include('dev.include.footer')
<script>
    $('#profileForm').on('submit',function(e){
        e.preventDefault();
        axios.post(`${url}/client/updateProfile`,new FormData(this)).then(function (response) {
            // handle success
            show_Toaster(response.data.message,response.data.type)
            }).catch(function (err) {
                show_Toaster(err.response.data.message,'error')
        })
     });
</script>