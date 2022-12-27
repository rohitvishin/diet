@include('dev.include.header')

<!-- fullcalender -->
<link rel="stylesheet" href="{{asset('assets/calender/lib/main.css') }}">
<script src="{{asset('assets/calender/lib/main.js') }}"></script>
@include('dev.include.sidebar')

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
                            <button type="button" onclick="show_modal()" class="btn btn-primary"> Add New Appointment </button>
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
<div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Enter Client Name</label>
                        <input type="text" name="" id="" class="form-control" placeholder="Enter Client Name">
                    </div>
                    <div class="col-md-6">
                        <label for="">Select Appointment Date</label>
                        <input type="text" class="form-control datepicker">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Select Appointment Start Time</label>
                        <input type="text" class="form-control timepicker">
                    </div>
                    <div class="col-md-6">
                        <label for="">Select Appointment End Time</label>
                        <input type="text" class="form-control timepicker">
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
<!-- Modal  -->

@include('dev.include.footer')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date();
        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
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
            stickyFooterScrollbar : true,

            events: 'https://fullcalendar.io/api/demo-feeds/events.json'
        });

        calendar.render();
    });
</script>
<script>
    function show_modal() {
        $('.modal').modal('show');
    }
</script>