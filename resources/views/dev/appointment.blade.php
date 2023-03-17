@include('dev.include.header')

<!-- fullcalender -->
<link rel="stylesheet" href="{{ asset('assets/calender/lib/main.css') }}">
<script src="{{ asset('assets/calender/lib/main.js') }}"></script>
<style>
.autocomplete-div {
    border: 1px solid #d4d4d4;
    border-bottom: none;
    border-top: none;
    z-index: 99;
    /*position the autocomplete items to be the same width as the container:*/
    top: 100%;
    left: 0;
    right: 0;
    padding: 10px;
    cursor: pointer;
    border-bottom: 1px solid #d4d4d4;
    margin-bottom: 0px;
}

#data {
    max-height: 150px;
    overflow-y: scroll;
}
</style>
@include('dev.include.sidebar')

<script>
var eventJS <?= !empty($json) ? '= '.json_encode($json) : `{}` ?>
</script>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Your Appointment</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" onclick="show_modal()" class="btn btn-primary"> Add New Appointment
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-2">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>


<!-- Modal  -->
<div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="addAppointment">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">New Client?</label>
                            <input type="checkbox" name="new_client" id="new_client" onclick="showClientTextbox(this)"
                                placeholder="Enter Client Name">
                        </div>
                        <hr>
                    </div>
                    <div class="row newClient d-none">
                        <div class="col-md-6">
                            <label for="">Enter Client Name</label>
                            <input type="text" name="new_client_name" id="" class="form-control"
                                placeholder="Enter Client Name">
                        </div>
                        <div class="col-md-6">
                            <label for="">Enter Client Mobile</label>
                            <input type="text" name="new_client_mobile" class="form-control"
                                placeholder="Enter Client Name">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-6  oldClient">
                            <label for="">Enter Client Name</label>
                            <input type="text" name="client_name" id="client_name" data-id="0" data-mobile="0"
                                class="form-control" oninput="getClientName(this)">
                            <div id="data"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Select Appointment Date</label>
                            <input type="text" name="appointment_date" class="form-control datepicker">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Select Appointment Start Time</label>
                            <input type="text" name="start_time" class="form-control timepicker">
                        </div>
                        <div class="col-md-6">
                            <label for="">Select Appointment End Time</label>
                            <input type="text" name="end_time" class="form-control timepicker">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal  -->
<!-- Modal  -->

@include('dev.include.footer')
<script>
function setClientName(e) {
    var clientID = $(e).attr('data-id')
    var clientMobile = $(e).attr('data-mobile')
    $('#client_name').attr('data-id', clientID);
    $('#client_name').attr('data-mobile', clientMobile);
    $('#client_name').val($(e).text());
    document.getElementById('data').innerHTML = '';
}

function getClientName(e) {
    var formdata = new FormData();
    formdata.append('param', $(e).val());
    axios.post(`${url}/getClientName`, formdata).then(function(response) {
        document.getElementById('data').innerHTML = '';
        $('#data').append(response.data.html)
    }).catch(function(err) {
        show_Toaster(err.response.data.message, 'error')
    })
}

function showClientTextbox(e) {
    if (e.checked) {
        $('.newClient').removeClass('d-none')
        $('.oldClient').addClass('d-none')
    } else {
        $('.newClient').addClass('d-none')
        $('.oldClient').removeClass('d-none')
    }
}


$('#addAppointment').on('submit', function(e) {
    e.preventDefault();
    var formdata = new FormData(this);

    formdata.append('client_id', $('#client_name').attr('data-id'));
    formdata.append('client_mobile', $('#client_name').attr('data-mobile'));
    axios.post(`${url}/addAppointment`, formdata).then(function(response) {
        // handle success
        show_Toaster(response.data.message, response.data.type)
        setTimeout(() => {
            window.location.href = `${url}/appointments`;
        }, 500);
    }).catch(function(err) {
        show_Toaster(err.response.data.message, 'error')
    })
});
document.addEventListener('DOMContentLoaded', function() {

    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    var date = yyyy + '-' + mm + '-' + dd;

    // var date = '2023-01-21';
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        now: date,
        scrollTime: '00:00', // undo default 6am scrollTime
        editable: true, // enable draggable events
        selectable: true,
        aspectRatio: 1.8,
        headerToolbar: {
            left: 'title',
            center: 'prev,next',
            right: 'timeGridDay,timeGridWeek,dayGridMonth,listWeek'
        },
        height: 'auto',
        dayMinWidth: 100,
        initialView: "dayGridMonth",
        stickyFooterScrollbar: true,

        events: eventJS
    });

    calendar.render();
});

function show_modal() {
    $('.modal').modal('show');
}
</script>