<!-- Main Content -->

@include('dev.include.header')
<script>
var user_data = <?= !empty($user_data) ? $user_data : '' ?>;
let user_id = `{{ $user_id ?? 0 }}`;
var is_data_changed = false;
var username = `{{ $username ?? '' }}`;
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
                                <!-- Payment -->
                                <div class="tab-pane fade show active" id="payment" role="tabpanel"
                                    aria-labelledby="contact-tab3">
                                    @include('dev.consultant.components.payment')
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
$('.nav-link').click(async function() {
    var url = $(this).attr('data-url');
    window.location.href = `{{ url('startAppointment/${username}/${url}') }} `

});

$('#saveUser').on('click', function() {
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
    if (purpose == 'other')
        purpose_other = $('#purpose_value_other').val()

    var data = {
        name,
        referrer,
        gender,
        mobile,
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
        client_id: x
    };
    axios.post(`${url}/client/save_user`, data, {
        headers: {
            'Content-Type': 'application/json',
        }
    }).then(function(response) {
        // handle success
        if (response.data.type === 'success') {
            show_Toaster(response.data.message, response.data.type);
            $('#profile-tab3').click();
        }
    }).catch(function(err) {
        show_Toaster(err.response.data.message, 'error')
    })
});

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
</script>

<script>
function checkSelectedValue(value) {
    if (value == 'other')
        $('#purpose_other').css('display', 'block');
    else
        $('#purpose_other').css('display', 'none');

}
</script>
<script>
    $(document).ready(function(){
        $('#add_container').click(function(){
            var html='<div class="row installation"><i class="fa fa-trash" onclick="removeContainer(this)"></i><div class="col-md-5"><div class="form-group"><label for="">Installment Amount</label><input type="d" name="" class="form-control" placeholder="Enter Amount" id=""></div></div><div class="col-md-5"><div class="form-group"><label for="">Installment Date</label><input type="date" name="" class="form-control" placeholder="Installment Date" id=""></div></div></div>';
        $('#main_container').append(html);
        })
    });
    function removeContainer(e){
        console.log('sdf');
        $(e).closest('.installation').remove();
    }
    
    $('#package_masters').change(function(){
        console.log('in');
        if ($('#package_masters').val()=='package_masters') {
            axios.get(`${url}/package_plan`).then(function(response) {
                (response.data).forEach((plans)=>{
                    var html='<option value='+plans.id+' data-duration='+plans.duration+' data-discount='+plans.discount+' data-currency='+plans.currency+' data-amount='+plans.amount+' data-tax='+plans.tax+' >'+plans.plan_name+'</option>';
                    $('#select_package').append(html);
                });
            }).catch(function(err) {
                show_Toaster(err.response.data.message, 'error')
            })
        }else{
            $('#select_package').empty();
        }
    })

    $('#select_package').change(function(){
        $("#duration").empty();
        $("#currency").empty();
        $("#duration").prepend("<option value="+$('#select_package option:selected').data('duration')+">"+$('#select_package option:selected').data('duration')+"</option>");
        $("#currency").prepend("<option value="+$('#select_package option:selected').data('currency')+">"+$('#select_package option:selected').data('currency')+"</option>");

        $('#discount').val($('#select_package option:selected').data('discount'));
        $('#amount').val($('#select_package option:selected').data('amount'));
        $('#tax').val($('#select_package option:selected').data('tax'));
        $('#final').val($('#select_package option:selected').data('tax')+$('#select_package option:selected').data('amount')-$('#select_package option:selected').data('discount'));
    });
    $('#down_payment').keyup(function(){
        $('#main_container').empty();
        var balance=$('#final').val()-$('#down_payment').val();
        var emi_no=$('#installment_no').val();
        var emi=balance/$('#installment_no').val();
        while(emi_no>0){
            var html='<div class="row installation"><i class="fa fa-trash" onclick="removeContainer(this)"></i><div class="col-md-5"><div class="form-group"><label for="">Installment Amount</label><input type="d" name="i_amount[]" class="form-control" value='+emi+' placeholder="Enter Amount" id=""></div></div><div class="col-md-5"><div class="form-group"><label for="">Installment Date</label><input type="date" name="i_date[]" class="form-control" placeholder="Installment Date" id=""></div></div></div>';
            $('#main_container').append(html);
            emi_no--;
        }
    });
</script>