<!-- Main Content -->

@include('dev.include.header')
<style>
.select2-container {
    display: unset !important;
}

.select2-dropdown--above {
    width: max-content !important;
}

.select2-dropdown--below {
    width: max-content !important;
}

.followUpAnthroCard {
    max-height: 550px;
    overflow-x: auto;
}

.followUpAnthro ul {
    list-style: none;
    padding-inline-start: 5px
}

.followUpAnthro ul li {
    list-style: none;
    border: 1px solid #eee;
    padding-inline-start: 5px
}

.nav .nav-item {
    display: grid;
    justify-content: center;
    align-content: center;
}

.nav .nav-item .nav-link i {
    display: none;
}

.nav .nav-item .nav-link span {
    display: inline;
}

.nav-pills .nav-item .nav-link {
    box-shadow: 0 2px 6px #acb5f6;
    color: #fff;
    background-color: #5db3f7;
    margin: 5px;
}

@media screen and (max-width:480px) {
    .nav {
        flex-wrap: unset !important;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .nav .nav-item .nav-link span {
        display: none;
    }

    .nav .nav-item .nav-link .tab-icon {
        display: inline;
    }

    .card .card-header,
    .card .card-body,
    .card .card-footer {
        padding: 20px 10px !important;
    }
}

.nav-pills .nav-item .nav-link.active {
    background-color: #660b95 !important;
}

.nav-pills .nav-item .nav-link:hover {
    background-color: #660b95 !important;
}

.hover-text-black:hover {
    color: black !important
}
</style>


<!-- fullcalender -->
<link rel="stylesheet" href="{{ asset('assets/modules/codemirror/lib/codemirror.css') }}">
<script src="{{ asset('assets/modules/codemirror/theme/duotone-dark.css') }}"></script>
@include('dev.include.sidebar')


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Start Appointment</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Settings</a></div>
                <div class="breadcrumb-item">Appointment</div>
            </div>
        </div>

        <div class="section-body">
            <div id="output-status"></div>
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Client Details</h4>
                        </div>
                        <div class="card-body">
                            <!-- <div class="row flex-row flex-nowrap">
                                
                            </div> -->
                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#basicdetails"
                                        role="tab" aria-controls="home" aria-selected="true"> <i
                                            class="fa fa-user tab-icon fa-2x" title="Basic Info"></i>
                                        <span>Patient Basic
                                            Details</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#medicalhistory"
                                        role="tab" aria-controls="profile" aria-selected="false"><i
                                            class="fa fa-file-medical tab-icon fa-2x"></i> <span>Medical
                                            history</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#payment" role="tab"
                                        aria-controls="contact" aria-selected="false"><i
                                            class="fa fa-box-open tab-icon fa-2x"></i>
                                        <span>Package &
                                            Payment</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab"
                                        aria-controls="contact" aria-selected="false"><i
                                            class="fa fa-notes-medical tab-icon fa-2x"></i>
                                        <span>Diet Chart</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#remark" role="tab"
                                        aria-controls="contact" aria-selected="false"><i
                                            class="fa fa-sticky-note tab-icon fa-2x"></i>
                                        <span>Remarks</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#followup" role="tab"
                                        aria-controls="contact" aria-selected="false"><i
                                            class="fa fa-comment tab-icon fa-2x"></i>
                                        <span>Follow ups</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#documents" role="tab"
                                        aria-controls="contact" aria-selected="false"><i
                                            class="fa fa-paperclip tab-icon fa-2x"></i>
                                        <span>Documents &
                                            Photos</span></a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <!-- Basic Details -->
                                <div class="tab-pane fade show active" id="basicdetails" role="tabpanel"
                                    aria-labelledby="home-tab3">
                                    @include('dev.consultant.components.basic_details')
                                </div>


                                <!-- Medical History Tab -->
                                <div class="tab-pane fade" id="medicalhistory" role="tabpanel"
                                    aria-labelledby="profile-tab3">
                                    @include('dev.consultant.components.medical_history')
                                </div>


                                <!-- Payment -->
                                <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="contact-tab3">
                                    @include('dev.consultant.components.payment')
                                </div>

                                <!-- Diet -->





                                <!-- Remarks -->
                                <div class="tab-pane fade" id="remark" role="tabpanel" aria-labelledby="contact-tab3">
                                    @include('dev.consultant.components.remarks')
                                </div>


                                <!-- Follow Up -->
                                <div class="tab-pane fade" id="followup" role="tabpanel" aria-labelledby="contact-tab3">
                                    @include('dev.consultant.components.followup_exercise')
                                </div>

                                <!-- Documents -->
                                <div class="tab-pane fade" id="documents" role="tabpanel"
                                    aria-labelledby="contact-tab3">
                                    @include('dev.consultant.components.documents')
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal  -->
<!-- Add Anthro Modal  -->
<div class="modal modal-xl anthro" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <th>Name</th>
                                <th>Value</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Weight (Kg)</td>
                                    <td><input type="text" class="form-control" id='modal_weight'></td>
                                </tr>
                                <tr>
                                    <td>Fat %</td>
                                    <td><input type="text" class="form-control" id="modal_fat"></td>
                                </tr>
                                <tr>
                                    <td>Total body water (Kg)</td>
                                    <td><input type="text" class="form-control" id="modal_tbw"></td>
                                </tr>
                                <tr>
                                    <td>Muscle Mass (Kg)</td>
                                    <td><input type="text" class="form-control" id="modal_muscle"></td>
                                </tr>
                                <tr>
                                    <td>Chest (Inches)</td>
                                    <td><input type="text" class="form-control" id="modal_chest"></td>
                                </tr>
                                <tr>
                                    <td>Upper Waist (Inches)</td>
                                    <td><input type="text" class="form-control" id="modal_upper_waist"></td>
                                </tr>
                                <tr>
                                    <td>Hips (Inches)</td>
                                    <td><input type="text" class="form-control" id="modal_hips"></td>
                                </tr>
                                <tr>
                                    <td>Lower Waist (Inches)</td>
                                    <td><input type="text" class="form-control" id="modal_lower_waist"></td>
                                </tr>
                                <tr>
                                    <td>BMR</td>
                                    <td><input type="text" class="form-control" id="modal_brm"></td>
                                </tr>
                                <tr>
                                    <td>Height (Cms)</td>
                                    <td><input type="text" class="form-control" id="modal_height_cms"></td>
                                </tr>
                                <tr>
                                    <td>Height</td>
                                    <td><input type="text" class="form-control" id="modal_height"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!-- Add Exsercise Modal  -->
<div class="modal exercise bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="exercise_form">
                <div class="modal-body exercise-modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Enter Date</label>
                            <input type="date" name="" id="" class="form-control" placeholder="Enter Client Name">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Enter Time</label>
                            <input type="number" name="" id="" class="form-control" placeholder="Enter Client Name">
                        </div>
                        <div class="col-md-6">
                            <label for="">No of Days.</label>
                            <input type="number" class="form-control datepicker">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="add_new_exercise_feild"
                        onclick="add_new_exercise_feilds(this)" value="0">Add New</button>
                    <button type="button" class="btn btn-secondary" onclick="close_exercise_modal()">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Medicine Modal -->

<div class="modal medicine bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="medicine_form">
                <div class="modal-body medicine-modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Enter Date</label>
                            <input type="date" name="" id="" class="form-control" placeholder="Enter Client Name">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name of Medicine</label>
                            <input type="number" name="" id="" class="form-control" placeholder="Enter Client Name">
                        </div>
                        <div class="col-md-6">
                            <label for="">Time Taken</label>
                            <input type="number" class="form-control datepicker">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="add_new_medicine_feild"
                        onclick="add_new_medicine_feilds(this)" value="0">Add New</button>
                    <button type="button" class="btn btn-secondary" onclick="close_medicine_modal()">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Add New Document -->
<div class="modal document bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="medicine_form">
                <div class="modal-body medicine-modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Enter Date</label>
                            <input type="date" name="" id="" class="form-control" placeholder="Enter Client Name">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name of Document</label>
                            <input type="number" name="" id="" class="form-control" placeholder="Enter Client Name">
                        </div>
                        <div class="col-md-6">
                            <label for="">Upload Document</label>
                            <input type="file" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="close_document_modal()">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add New Remark -->
<div class="modal remark bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Remark</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="medicine_form">
                <div class="modal-body medicine-modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Enter Date</label>
                            <input type="date" name="" id="" class="form-control" placeholder="Enter Client Name">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Remarks</label>
                            <textarea type="text" name="" id="" class="form-control"
                                placeholder="Enter Remark"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="close_remark_modal()">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Diet Followed -->
<div class="modal modal-xl diet" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <th>Name</th>
                                <th>Value</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Vitamins</td>
                                    <td><input type="text" class="form-control" id='modal_weight'></td>
                                </tr>
                                <tr>
                                    <td>General Health</td>
                                    <td><input type="text" class="form-control" id="modal_fat"></td>
                                </tr>
                                <tr>
                                    <td>Reports</td>
                                    <td><input type="text" class="form-control" id="modal_tbw"></td>
                                </tr>
                                <tr>
                                    <td>Met Dr</td>
                                    <td><input type="text" class="form-control" id="modal_muscle"></td>
                                </tr>
                                <tr>
                                    <td>Food Plan</td>
                                    <td><input type="text" class="form-control" id="modal_chest"></td>
                                </tr>
                                <tr>
                                    <td>Diet Advised</td>
                                    <td><input type="text" class="form-control" id="modal_upper_waist"></td>
                                </tr>
                                <tr>
                                    <td>Meal Timing</td>
                                    <td><input type="text" class="form-control" id="modal_hips"></td>
                                </tr>
                                <tr>
                                    <td>Portion Control</td>
                                    <td><input type="text" class="form-control" id="modal_lower_waist"></td>
                                </tr>
                                <tr>
                                    <td>Carbs</td>
                                    <td><input type="text" class="form-control" id="modal_brm"></td>
                                </tr>
                                <tr>
                                    <td>Protien</td>
                                    <td><input type="text" class="form-control" id="modal_height_cms"></td>
                                </tr>
                                <tr>
                                    <td>Fried</td>
                                    <td><input type="text" class="form-control" id="modal_height"></td>
                                </tr>
                                <tr>
                                    <td>Desert</td>
                                    <td><input type="text" class="form-control" id="modal_height"></td>
                                </tr>
                                <tr>
                                    <td>Other Cheating</td>
                                    <td><input type="text" class="form-control" id="modal_height"></td>
                                </tr>
                                <tr>
                                    <td>Meal Out</td>
                                    <td><input type="text" class="form-control" id="modal_height"></td>
                                </tr>
                                <tr>
                                    <td>Alchol</td>
                                    <td><input type="text" class="form-control" id="modal_height"></td>
                                </tr>
                                <tr>
                                    <td>Travel</td>
                                    <td><input type="text" class="form-control" id="modal_height"></td>
                                </tr>
                                <tr>
                                    <td>Diet plan %</td>
                                    <td><input type="text" class="form-control" id="modal_height"></td>
                                </tr>
                                <tr>
                                    <td>Remarks</td>
                                    <td><input type="text" class="form-control" id="modal_height"></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  -->


@include('dev.include.footer')

<!-- JS Libraies -->
<script src="{{ asset('assets/modules/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ asset('assets/modules/codemirror/mode/javascript/javascript.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/features-setting-detail.js') }}"></script>

<script>
// Common Functions
function removeDiv(id) {
    $(`#${id}`).remove();
}


// Anthro Tab Functions
function show_anthro_modal() {
    $('.anthro').modal('show');
}


// Exercise Tab Functions
function show_exercise_modal() {
    $('.exercise').modal('show');
}

function add_new_exercise_feilds(e) {
    var newkey = parseInt($(e).val()) + 1;
    $('.exercise-modal-body').append(`
    
        <div class="row mt-4 mb-2 p-2 new_exercise_feild" style="border-top:1px solid #eee" id="exercise_feild_div-${newkey}">
            <div class="col-md-5 col-sm-12">
                <label for="">Enter Time</label>
                <input type="number" name="" id="" class="form-control" placeholder="Enter Client Name">
            </div>
            <div class="col-md-5 col-sm-12">
                <label for="">No of Days.</label>
                <input type="number" class="form-control datepicker">
            </div>
            <div class="col-md-2 col-sm-12">
                <label>Action</label>
                <button type="button" onclick="removeDiv('exercise_feild_div-${newkey}')" class="form-control btn btn-primary"><i class="fa fa-trash"></i></button>
            </div>
        </div>
    `);
    $(e).val(newkey);
}

function close_exercise_modal() {
    document.getElementById("exercise_form").reset();
    $('.new_exercise_feild').remove();
    $('#add_new_exercise_feild').val(0);
    $('.exercise').modal('hide');
}


// Medicine Tab Functions
function show_medicine_modal() {
    $('.medicine').modal('show');
}

function add_new_medicine_feilds(e) {
    var newkey = parseInt($(e).val()) + 1;
    $('.medicine-modal-body').append(`
    
        <div class="row mt-4 mb-2 p-2 new_medicine_feild" style="border-top:1px solid #eee" id="medicine_feild_div-${newkey}">
            <div class="col-md-5 col-sm-12">
                <label for="">Name of Medicine</label>
                <input type="number" name="" id="" class="form-control" placeholder="Enter Medicine Name">
            </div>
            <div class="col-md-5 col-sm-12">
                <label for="">Time Taken</label>
                <input type="number" class="form-control" placeholder="Enter Time taken">
            </div>
            <div class="col-md-2 col-sm-12">
                <label>Action</label>
                <button type="button" onclick="removeDiv('medicine_feild_div-${newkey}')" class="form-control btn btn-primary"><i class="fa fa-trash"></i></button>
            </div>
        </div>
    `);
    $(e).val(newkey);
}

function close_medicine_modal() {
    document.getElementById("medicine_form").reset();
    $('.new_medicine_feild').remove();
    $('#add_new_medicine_feild').val(0);
    $('.medicine').modal('hide');
}

// Document Tab
function show_document_modal() {
    $('.document').modal('show');
}

function close_document_modal() {
    $('.document').modal('hide');
}

// Remarks Tab
function show_remark_modal() {
    $('.remark').modal('show');
}

function close_remark_modal() {
    $('.remark').modal('hide');
}


// Add Diet Followed Modal
function show_diet_modal() {
    $('.diet').modal('show');
}
</script>
<script>
    $('#saveUser').on('click',function(){
        if($('#client_id').val()>0){
            var client_id = $('#client_id').val();
        }else{
            var client_id=0;
        }
        console.log(client_id);
        const name = $('input[name="name"]').val();
        const referrer = $('input[name="referrer"]').val();
        const gender = $('#gender').val();
        const mobile = $('input[name="mobile"]').val();
        const email = $('input[name="email"]').val();
        const address = $('#address').val();
        const city = $('input[name="city"]').val();
        const state = $('input[name="state"]').val();
        const pincode = $('input[name="pincode"]').val();
        const dob = $('input[name="dob"]').val();
        const age = $('input[name="age"]').val();
        const maritalstatus = $('#maritalstatus').val();
        const purpose = $('#purpose').val();
        var data = {name:name,referrer:referrer,gender:gender,mobile,email:email,address:address,city:city,state:state,pincode:pincode,dob:dob,age:age,maritalstatus:maritalstatus,purpose:purpose,client_id:client_id};
        axios.post(`${url}/client/save_user`,data,{headers: {
            'Content-Type': 'application/json',
        }}).then(function (response) {
                // handle success
                if (response.data.type === 'success') {
                    show_Toaster(response.data.message,response.data.type);
                    $('#profile-tab3').click();
                }
            }).catch(function (err) {
                show_Toaster(err.response.data.message,'error')
        })
    });
    $('#mobile').keyup(function(){
        var mobile=$('#mobile').val();
        if(mobile.length>=10){
            $('#client_id').val(0);
            axios.get(`${url}/client/get_user/`+mobile).then(function (response) {
                if (response.data.mobile == mobile) {
                    $('input[name="name"]').val(response.data.name);
                    $('input[name="referrer"]').val(response.data.referrer);
                    $('#gender').val(response.data.gender);
                    $('input[name="email"]').val(response.data.email);
                    $('#address').val(response.data.address);
                    $('input[name="city"]').val(response.data.city);
                    $('input[name="state"]').val(response.data.state);
                    $('input[name="pincode"]').val(response.data.pincode);
                    $('input[name="dob"]').val(response.data.dob);
                    $('input[name="age"]').val(response.data.age);
                    $('#maritalstatus').val(response.data.maritalstatus);
                    $('#purpose').val(response.data.purpose);
                    $('#client_id').val(response.data.id);
                }else{
                    $('#client_id').val(0);
                }
            }).catch(function (err) {
                show_Toaster(err.response.data.message,'error')
            })
        }
    });
    // $('#purpose').change(function(){
    //     if($('#purpose').val()=='other'){
    //         $('#otherPurpose').show();
    //         $('#inputForPurpose').attr('name','purpose');
    //         $('#purpose').attr('name','');
    //     }else{
    //         $('#otherPurpose').hide();
    //         $('#inputForPurpose').attr('name','');
    //         $('#purpose').attr('name','purpose');
    //     }
    // });
</script>