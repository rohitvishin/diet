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
                                <!-- Basic Details -->
                                <div class="tab-pane fade show active" id="basicdetails" role="tabpanel"
                                    aria-labelledby="home-tab3">
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


@include('dev.include.footer')

<!-- JS Libraies -->
<script src="{{ asset('assets/modules/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ asset('assets/modules/codemirror/mode/javascript/javascript.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/features-setting-detail.js') }}"></script>

<script>
var user_data <?= !empty($user_data) && $user_data != 'null' ? '= '.$user_data : `{}` ?>;
let user_id = `{{ $user_id }}`;
var is_data_changed = false;
var mobile = `{{ $mobile ?? '' }}`;


// Common Functions
function removeDiv(id) {
    $(`#${id}`).remove();
}

async function getDataJson() {
    const name = $('input[name="name"]').val();
    const referrer = $('input[name="referrer"]').val();
    const gender = $('#gender').val();
    const mobile = $('input[name="mobile"]').val();
    const profession = $('input[name="profession"]').val();
    const working_hours = $('input[name="working_hours"]').val();
    const social_media = $('#social_media').val();
    const email = $('input[name="email"]').val();
    const address = $('#address').val();
    const city = $('input[name="city"]').val();
    const state = $('input[name="state"]').val();
    const pincode = $('input[name="pincode"]').val();
    const dob = $('input[name="dob"]').val();
    const age = $('input[name="age"]').val();
    const maritalstatus = $('#maritalstatus').val();
    const purpose = $('#purpose').val();
    const purpose_other = purpose != 'other' ? '---' : $('#purpose_value_other').val()

    var data = {
        name,
        referrer,
        gender,
        mobile,
        profession,
        working_hours,
        social_media,
        email,
        address,
        city,
        state,
        pincode,
        dob,
        age,
        maritalstatus,
        purpose,
        purpose_other,
        client_id: user_id
    };

    return data;
}

// POst User Data and update in table
$('#saveUser').on('click', async function() {

    $('#saveUser').text('Updating...');
    var data = await getDataJson();
    axios.post(`${url}/save_basic_details`, data, {
        headers: {
            'Content-Type': 'application/json',
        }
    }).then(function(response) {

        show_Toaster(response.data.message, response.data.type);
        location.reload();

    }).catch(function(err) {
        show_Toaster(err.response.data.message, 'error')
    })

    $('#saveUser').text('Save Changes');
});


// On Mobile number Get Data
$('#mobile').keyup(function() {
    var mobile = $('#mobile').val();
    if (mobile.length >= 10) {
        $('#client_id').val(0);
        axios.get(`${url}/client/get_user/` + mobile).then(function(response) {
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
            } else {
                $('#client_id').val(0);
            }
        }).catch(function(err) {
            show_Toaster(err.response.data.message, 'error')
        })
    }
});


// check Purpose Selected Value if other then show textbox
function checkSelectedValue(value) {
    value = $('#purpose').val();
    if (value == 'other')
        $('#purpose_other').css('display', 'block');
    else {
        $('#purpose_value_other').value = value;
        $('#purpose_other').css('display', 'none');
    }
}


// calculate Age and update value
function updateAge(date) {
    var birthyear = new Date(date);
    var nowyear = new Date();
    var age = nowyear.getYear() - birthyear.getYear();
    if (nowyear.getMonth() >= birthyear.getMonth()) {
        if (nowyear.getDate() <= birthyear.getDate())
            age = age - 1
    } else
        age = age - 1

    $('input[name="age"]').val(age);
}

$(document).ready(function() {
    checkSelectedValue('asda');
});


$('.nav-link').click(async function() {
    var url = $(this).attr('data-url');
    window.location.href = `{{ url('startAppointment/${mobile}/${url}') }} `
});
</script>