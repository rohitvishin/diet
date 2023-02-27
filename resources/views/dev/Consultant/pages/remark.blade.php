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
                <div class="breadcrumb-item">{{ ucwords($url) }}</div>
            </div>
        </div>

        <div class="section-body">
            <div id="output-status"></div>
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Client {{ ucwords($url) }}</h4>
                        </div>
                        <div class="card-body">
                            @include('dev.consultant.components.patient_details')
                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                @include('dev.consultant.components.nav_bar')
                            </ul>
                            <div class="tab-content" id="myTabContent2">

                                <!-- Remarks -->
                                <div class="tab-pane fade show active" id="remark" role="tabpanel"
                                    aria-labelledby="contact-tab3">
                                    @include('dev.consultant.components.remarks')
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
                            <input type="date" name="" id="remark_date" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Remarks</label>
                            <textarea type="text" name="" id="remark_input" class="form-control"
                                placeholder="Enter Remark"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="close_remark_modal()">Close</button>
                    <button type="button" class="btn btn-primary" id="saveUser">Save changes</button>
                </div>
            </form>
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
// Remarks Tab
function show_remark_modal(data, type) {

    if (type == 'update') {

        var data = JSON.parse(data);

        var date = new Date(data.remark_date)
        var remark_date = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
        $('#remark_date').val(data.remark_date);
        $('#remark_input').val(data.remark);
        $('#saveUser').val(type);
        $('#saveUser').attr('data-id', data.id);
    }
    $('#saveUser').val(type);
    $('.remark').modal('show');

}

function close_remark_modal() {
    $('#remark_date').val('');
    $('#remark_input').val('');
    $('#saveUser').val('');
    $('.remark').modal('hide');
}


async function getDataJson() {

    const id = $('#saveUser').attr('data-id');
    const remark_date = $('#remark_date').val();
    const remark = $('#remark_input').val();
    const process = $('#saveUser').val();
    var data = {
        id,
        remark_date,
        remark,
        process,
        client_id: `{{ $user_id }}`
    };

    return data;
}

$('#saveUser').on('click', async function() {
    var data = await getDataJson();
    axios.post(`${url}/save_remarks`, data, {
        headers: {
            'Content-Type': 'application/json',
        }
    }).then(function(response) {
        // handle success
        if (response.data.type === 'success') {
            show_Toaster(response.data.message, response.data.type);
            location.reload();
        }
    }).catch(function(err) {
        show_Toaster(err.response.data.message, 'error')
    })
});

$('.nav-link').click(async function() {
    var url = $(this).attr('data-url');
    window.location.href = `{{ url('startAppointment/${username}/${url}') }} `
});
</script>