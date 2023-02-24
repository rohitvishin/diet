<!-- Main Content -->

@include('dev.include.header')
<script>
let user_id = `{{ $user_id ?? 0}}`;
var is_data_changed = false;
var username = `{{ $username ?? '' }}`;
var mainurl = `{{ $url ?? '' }}`;
var suburl = `{{ $suburl ?? '' }}`;
</script>
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

.errorTextbox {
    animation: shake 0.2s ease-in-out 0s 2;
    border: 1px solid red;
}

@keyframes shake {
    0% {
        margin-left: 0rem;
    }

    25% {
        margin-left: 0.5rem;
    }

    75% {
        margin-left: -0.5rem;
    }

    100% {
        margin-left: 0rem;
    }
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
                            @include('dev.consultant.components.patient_details')
                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                @include('dev.consultant.components.nav_bar')
                            </ul>
                            <div class="tab-content" id="myTabContent2">

                                <!-- Follow Up -->
                                <div class="tab-pane fade show active" id="followup" role="tabpanel"
                                    aria-labelledby="contact-tab3">
                                    @include('dev.consultant.components.'.$url)
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
            <form id="anthroform">
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
                                        <td>Date</td>
                                        <td><input type="date" class="form-control" name="anthro_date" id='anthro_date'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Weight (Kg)</td>
                                        <td><input type="text" class="form-control" name="weight" id='weight' value="0">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Fat %</td>
                                        <td><input type="text" class="form-control" name="fat" id="fat" value="0">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total body water (Kg)</td>
                                        <td><input type="text" class="form-control" name="body_water" id="body_water"
                                                value="0">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Muscle Mass (Kg)</td>
                                        <td><input type="text" class="form-control" name="muscle_mass" value="0"
                                                id="muscle_mass"></td>
                                    </tr>
                                    <tr>
                                        <td>Chest (Inches)</td>
                                        <td><input type="text" class="form-control" name="chest" id="chest" value="0">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Upper Waist (Inches)</td>
                                        <td><input type="text" class="form-control" name="upper_waist" value="0"
                                                id="upper_waist"></td>
                                    </tr>
                                    <tr>
                                        <td>Hips (Inches)</td>
                                        <td><input type="text" class="form-control" name="hips" id="hips" value="0">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lower Waist (Inches)</td>
                                        <td><input type="text" class="form-control" name="lower_waist" value="0"
                                                id="lower_waist"></td>
                                    </tr>
                                    <tr>
                                        <td>BMR</td>
                                        <td><input type="text" class="form-control" name="bmr" id="bmr" value="0">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Height (Cms)</td>
                                        <td><input type="text" class="form-control" name="height_cm" value="0"
                                                id="height_cm"></td>
                                    </tr>
                                    <tr>
                                        <td>Height</td>
                                        <td><input type="text" class="form-control" name="height" value="0" id="height">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveAnthro" data-process="add" data-type="anthro"
                        onclick="submitForm(this)">Save changes</button>
                </div>
            </form>
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
            <form action="" id="exerciseform">
                <div class="modal-body exercise-modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Enter Date</label>
                            <input type="date" name="exercise_date" id="exercise_date" class="form-control"
                                placeholder="Enter Client Name">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Enter Exercise Name</label>
                            <input type="text" name="exercise[0][exercise_name]" id="exercise_name" class="form-control"
                                placeholder="Enter Exercise Name">
                        </div>
                        <div class="col-md-4">
                            <label for="">Exercise Set / Unit</label>
                            <input type="text" class="form-control" id="exercise_unit" name="exercise[0][exercise_unit]"
                                placeholder="Exercise Set / Unit">
                        </div>
                        <div class="col-md-4">
                            <label for="">Exercise Durations</label>
                            <input type="text" class="form-control" id="exercise_duration"
                                placeholder="Exercise Duration" name="exercise[0][exercise_duration]">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="add_new_exercise_feild"
                        onclick="add_new_exercise_feilds(this)" value="0">Add New</button>
                    <button type="button" class="btn btn-secondary" onclick="close_exercise_modal()">Close</button>
                    <button type="button" class="btn btn-primary" id="saveExercise" data-process="add"
                        data-type="exercise" onclick="submitForm(this)">Save
                        changes</button>
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
function show_anthro_modal(json, type) {
    if (type == 'add')
        $('.anthro').modal('show');
    else if (type == 'edit')

}

// Exercise Tab Functions
function show_exercise_modal(json, type) {

    if (type == 'add') {
        $('#add_new_exercise_feild').css('display', 'block');
        $('.exercise').modal('show');
    } else if (type == 'edit') {

        $('#add_new_exercise_feild').css('display', 'none');
        // add feilds in textbox
        $('#exercise_date').val(JSON.parse(json).exercise_date);
        $('#exercise_name').val(JSON.parse(json).exercise_name);
        $('#exercise_unit').val(JSON.parse(json).exercise_unit);
        $('#exercise_duration').val(JSON.parse(json).exercise_duration);
        // add client_id in button
        $('#saveExercise').attr('data-id', JSON.parse(json).id)
        $('#saveExercise').attr('data-client_id', JSON.parse(json).client_id)
        $('#saveExercise').attr('data-process', 'edit')
        // add type of button


        $('.exercise').modal('show');
    }

}

function add_new_exercise_feilds(e) {
    var newkey = parseInt($(e).val()) + 1;
    $('.exercise-modal-body').append(`
    
        <div class="row mt-4 mb-2 p-2 new_exercise_feild" style="border-top:1px solid #eee" id="exercise_feild_div-${newkey}">
            <div class="col-md-3 col-sm-12">
                <label for="">Enter Exercise Name</label>
                <input type="text" name="exercise[${newkey}][exercise_name]" id="" class="form-control" placeholder="Exercise Name">
            </div>
            <div class="col-md-3 col-sm-12">
                <label for="">Set / Units</label>
                <input type="text" class="form-control" placeholder="Set / Unit " name="exercise[${newkey}][exercise_unit]">
            </div>
            <div class="col-md-3 col-sm-12">
                <label for="">Duration</label>
                <input type="text" class="form-control" placeholder="Duration" name="exercise[${newkey}][exercise_duration]">
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

// Add Diet Followed Modal
function show_diet_modal() {
    $('.diet').modal('show');
}

async function getDataJson(type, rowid) {
    var data = new FormData(document.getElementById(`${type}form`));
    data.append('type', type);
    data.append('id', rowid);
    data.append('client_id', user_id);
    return data;
}

$('.nav-link').click(async function() {
    var url = $(this).attr('data-url');
    window.location.href = `{{ url('startAppointment/${username}/${url}') }} `
});

async function submitForm(e) {

    $(e).text('Please wait...');
    var type = $(e).attr('data-type');
    var process = $(e).attr('data-process');
    var rowid = process == 'edit' ? $(e).attr('data-id') : 0;
    var data = await getDataJson(type, rowid);
    var axiosURL = process == 'add' ? `${url}/save_followup_data` : `${url}/edit_followup_data`;

    $(`form#${type}form :input`).removeClass('errorTextbox');

    axios.post(axiosURL, data, {
        headers: {
            'Content-Type': 'application/json',
        }
    }).then(function(response) {
        $(e).text('Save Changes');
        // handle success
        show_Toaster(response.data.message, response.data.type);
        if (response.data.type === 'success') {
            window.location.href =
                `{{ url('/startAppointment/${username}/${mainurl}/${suburl}') }} `
        } else {
            $(`form#${type}form :input`).each(function() {
                var input = $(this); // This is the jquery object of the input, do what you will
                $(this).removeClass('errorTextbox');
                if ($(this).val() == '' && $(this).attr('type') != 'button')
                    $(this).addClass('errorTextbox');
                else
                    $(this).removeClass('errorTextbox');
            });
        }
    }).catch(function(err) {
        show_Toaster(err.response.data.message, 'error')
    })
}
</script>