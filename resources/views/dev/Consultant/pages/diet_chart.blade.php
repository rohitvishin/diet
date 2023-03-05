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

.modal-xl {
    max-width: 800px
}

@media (min-width:1200px) {
    .modal-xl {
        max-width: 1140px
    }
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
                                <!-- Documents -->
                                <div class="tab-pane fade show active" id="diet_chart" role="tabpanel"
                                    aria-labelledby="contact-tab3">
                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-primary"
                                                onclick="show_diet_chart_modal('','add')">Add New Diet Plan</button>
                                        </div>
                                        <div class="card-body">

                                            <div class="row">
                                                <table class="table table-bordered table-sm">
                                                    <thead class="bg-primary">
                                                        <th>Date</th>
                                                        <th>Plan Name</th>
                                                        <th>Plan Intro</th>
                                                        <th>Action</th>
                                                    </thead>
                                                    <tbody>
                                                        @if (count($user_data) > 0)
                                                        @foreach ($user_data as $single_data)
                                                        <tr>
                                                            <td>{{ $single_data['diet_chart_date'] }}</td>
                                                            <td>{{ $single_data['plan_name'] }}</td>
                                                            <td>{{ $single_data['plan_intro'] }}</td>
                                                            <td><a class="btn btn-danger text-white"
                                                                    onclick="delete_diet_chart('{{ $single_data['id'] }}','{{ $single_data['client_id'] }}','delete')">Delete</a>
                                                                <a class="btn btn-primary text-white"
                                                                    onclick="show_diet_chart_modal('{{ $single_data['id'] }}','{{ $single_data['diet_chart_date'] }}','{{ $single_data['plan_name'] }}','{{ $single_data['plan_intro'] }}',`{{ $single_data['diet_chart_template'] }}`,'update')">Edit</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <th>No Data Found..
                                                        </th>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
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
<!-- Add New Document -->
<div class="modal diet_plan bd-example-modal-xl" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Diet Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="diet_plan_form">
                <div class="modal-body medicine-modal-body">
                    <div class="row">
                        @if($data->isEmpty() && count($data) > 0)
                        <select name="template_id" id="template_id">
                            @foreach($data as $singleTemplate)
                            <option value=""></option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Diet Date</label>
                            <input type="date" name="diet_chart_date" id="diet_chart_date" class="form-control"
                                placeholder="Enter Client Name">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Plan Name</label>
                            <input type="text" name="plan_name" id="plan_name" class="form-control"
                                placeholder="Enter Plan Name">
                        </div>
                        <div class="col-md-6">
                            <label for="">Plan Intro</label>
                            <input type="text" id="plan_intro" name="plan_intro" class="form-control"
                                placeholder="Enter Plan Intro">
                        </div>
                        <div class="col-md-12">
                            <label for="">Dite Plan</label>
                            <textarea id="diet_chart_template" name="diet_chart_template" rows="10" cols="80"
                                class="form-control"></textarea>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="close_diet_plan_modal()">Close</button>
                    <button id="saveDietTemplate" type="button" class="btn btn-primary" data-process="add">Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal  -->


@include('dev.include.footer')

<!-- JS Libraies -->
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script src="{{ asset('assets/modules/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ asset('assets/modules/codemirror/mode/javascript/javascript.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/features-setting-detail.js') }}"></script>

<script>
// Document Tab

CKEDITOR.replace('diet_chart_template');

function show_diet_chart_modal(id, diet_chart_date, plan_name, plan_intro, diet_chart_template, process) {
    document.getElementById("diet_plan_form").reset();
    if (process == 'add')
        $('.diet_plan').modal('show');
    else {
        $('#diet_chart_date').val(diet_chart_date)
        $('#plan_name').val(plan_name)
        $('#plan_intro').val(plan_intro)
        CKEDITOR.instances.diet_chart_template.setData(diet_chart_template)
        $('#saveDietTemplate').attr('data-process', process)
        $('#saveDietTemplate').attr('data-id', id)
        $('.diet_plan').modal('show');
    }

}

function close_diet_plan_modal() {
    $('.diet_plan').modal('hide');
}

function delete_diet_chart(id, client_id, process) {

    if (confirm("Are you sure you want to do that?")) {
        var formdata = new FormData();
        formdata.append('id', id);
        formdata.append('client_id', client_id);
        formdata.append('process', process);
        axios.post(`${url}/update_diet_chart_template_data`, formdata, {
            headers: {
                'Content-Type': 'application/json',
            }
        }).then(function(response) {
            // handle success
            show_Toaster(response.data.message, response.data.type);
            if (response.data.type === 'success') {
                location.reload();
            }
        }).catch(function(err) {
            show_Toaster(err.response.data.message, 'error')
        })
    }
}
$('#saveDietTemplate').on('click', async function() {

    let data = new FormData(document.getElementById('diet_plan_form'));
    data.append('client_id', user_id);
    data.append('process', $('#saveDietTemplate').attr('data-process'));
    data.append('id', $('#saveDietTemplate').attr('data-id'));
    data.append('diet_chart_template', CKEDITOR.instances.diet_chart_template.getData());

    axios.post(`${url}/update_diet_chart_template_data`, data, {
        headers: {
            'Content-Type': 'application/json',
        }
    }).then(function(response) {
        // handle success
        show_Toaster(response.data.message, response.data.type);
        if (response.data.type === 'success') {
            location.reload();
        }
    }).catch(function(err) {
        show_Toaster(err.response.data.message, 'error')
    })
});

var user_data <?= !empty($user_data) && $user_data != 'null' ? '= '.$user_data : `{}` ?>;
let user_id = `{{ $user_id }}`;
var is_data_changed = false;
var mobile = `{{ $mobile ?? '' }}`;

$('.nav-link').click(async function() {
    var url = $(this).attr('data-url');
    window.location.href = `{{ url('startAppointment/${mobile}/${url}') }} `
});
</script>