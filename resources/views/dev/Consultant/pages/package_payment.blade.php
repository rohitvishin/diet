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

<!-- Payment Modal -->
<div class="modal package_payment bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Remark</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="packageForm">
                @csrf
                <div class="modal-body medicine-modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Package Date</label>
                                        <input type="date" id="payment_date" name="payment_date"
                                            placeholder="Enter Amount" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Package Type</label>
                                        <select name="package_masters" id="package_masters" class="form-control">
                                            <option value="flat">Flat Fee</option>
                                            <option value="package_masters">Package</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 package_master d-none">
                                    <div class="form-group">
                                        <label for="">Select Package</label>
                                        <select name="package_id" id="select_package" class="form-control"></select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Select Duration</label>
                                        <input type="text" id="duration" name="duration" placeholder="Enter Amount"
                                            class="form-control">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Select Currency</label>
                                        <select name="currency" id="currency" class="form-control">
                                            <option value="">USD</option>
                                            <option value="">INR</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Amount</label>
                                        <input type="text" id="amount" name="amount" oninput="calculateFinalAmount()"
                                            placeholder="Enter Amount" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Discount %</label>
                                        <input type="text" id="discount" oninput="calculateFinalAmount()"
                                            name="discount" placeholder="Enter Discount %" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Final Amount</label>
                                        <input type="text" name="final_amt" id="final_amt"
                                            placeholder="Amount - (Discount %)" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Start Date</label>
                                        <input type="date" name="start_date" id="start_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">End Date</label>
                                        <input type="date" name="end_date" id="end_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Payment Method</label>
                                        <select name="payment_method" id="payment_method" class="form-control">
                                            <option value="cash">Cash</option>
                                            <option value="cheque">Cheque</option>
                                            <option value="card">Card</option>
                                            <option value="net">Net Banking</option>
                                            <option value="paytm">Paytm</option>
                                            <option value="upi">UPI</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Transaction Number / ID</label>
                                        <input type="text" name="transaction_id" id="transaction_id"
                                            placeholder="Enter Transaction Number" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Partial Payment ? <input type="checkbox" name="emi_checkbox" id="emi_checkbox"
                                            onclick="showInstallmentDiv()">
                                    </h6>
                                </div>
                                <div class="col-md-3 installmentDiv d-none">
                                    <div class="form-group">
                                        <label for="">No. of Installment</label>
                                        <input type="text" name="no_emi" class="form-control"
                                            oninput="appendInstalmentDiv()" placeholder="No. of Installment"
                                            id="no_emi">
                                    </div>
                                </div>
                                <div class="col-md-3 installmentDiv d-none">
                                    <div class="form-group">
                                        <label for="">Initial Payment</label>
                                        <input type="text" name="down_payment" oninput="appendInstalmentDiv()"
                                            class="form-control" placeholder="Enter Initial Amount" value="0"
                                            id="down_payment">
                                    </div>
                                </div>
                            </div>

                            <div class="card installmentDiv d-none">
                                <i class="fa fa-plus" style="" id="add_container">Add Installment</i>
                                <div class="card-body" id="main_container"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="close_payment_modal()">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


@include('dev.include.footer')

<!-- JS Libraies -->
<script src="{{ asset('assets/modules/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ asset('assets/modules/codemirror/mode/javascript/javascript.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/features-setting-detail.js') }}"></script>

<script>
let user_id = `{{ $user_id }}`;
var is_data_changed = false;
var mobile = `{{ $mobile ?? '' }}`;

$('.appointment-link').click(async  function() {
    var url = $(this).attr('data-url');
    window.location.href = `{{ url('startAppointment/${mobile}/${url}') }} `
});

function showInstallmentDiv() {
    if (document.getElementById('emi_checkbox').checked)
        $('.installmentDiv').removeClass('d-none');
    else {
        $('#no_emi').val(0);
        $('#no_emi').val(0);
        $('#down_payment').val(0);
        $('.installmentDiv').addClass('d-none');
        $('.installation').remove();
    }
}

function calculateFinalAmount() {
    var amount = parseInt($('#amount').val() == '' ? 0 : $('#amount').val());
    var discount = parseInt($('#discount').val() == '' ? 0 : $('#discount').val());
    var final_amt = amount - (amount * discount / 100);
    $('#final_amt').val(final_amt);

    if (document.getElementById('emi_checkbox').checked)
        appendInstalmentDiv()
}

$('#add_container').click(function() {
    $('#no_emi').val(parseInt($('#no_emi').val()) + 1)
    appendInstalmentDiv()
})

function removeContainer(e) {
    $(e).closest('.installation').remove();
    $('#no_emi').val(parseInt($('#no_emi').val()) - 1)
    appendInstalmentDiv()
}

$('#package_masters').change(function() {

    if ($('#package_masters').val() == 'package_masters') {
        $('.package_master').removeClass('d-none')
        axios.get(`${url}/package_plan`).then(function(response) {
            $('#select_package').empty();
            (response.data).forEach((plans) => {
                var html = '<option value=' + plans.id + ' data-duration=' + plans.duration +
                    ' data-discount=' + plans.discount + ' data-currency=' + plans.currency +
                    ' data-amount=' + plans.amount + ' data-tax=' + plans.tax + ' >' + plans
                    .plan_name + '</option>';
                $('#select_package').append(html);
            });
        }).catch(function(err) {
            show_Toaster(err.response.data.message, 'error')
        })
    } else {
        $('.package_master').addClass('d-none')
    }
})

$('#select_package').change(function() {
    $("#duration").empty();
    $("#currency").empty();
    $("#duration").val($('#select_package option:selected').data('duration'));
    $("#currency").prepend("<option value=" + $('#select_package option:selected').data('currency') + ">" + $(
        '#select_package option:selected').data('currency') + "</option>");
    $('#discount').val($('#select_package option:selected').data('discount'));
    $('#amount').val($('#select_package option:selected').data('amount'));

    calculateFinalAmount()

});


function appendInstalmentDiv() {

    $('.installation').remove();
    var final_amt = parseInt($('#final_amt').val()) - parseInt($('#down_payment').val())
    var emi = parseInt($('#no_emi').val());
    var emi_amt = final_amt / emi;

    for (var i = 1; i <= emi; i++) {
        var html = `<div class="row installation">
            <i class="fa fa-trash" onclick="removeContainer(this)"></i>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="">Installment Amount</label>
                    <input type="text" name="installment[${i}][amount]" class="form-control" value='${parseFloat(emi_amt)}' placeholder="Enter Amount" id="">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="">Installment Date</label>
                    <input type="date" name="installment[${i}][date]" class="form-control" value='' placeholder="Enter Amount" id="" required>
                </div>
            </div>
        </div>`;

        $('#main_container').append(html);
    }
}

$('#packageForm').submit(function(e) {
    e.preventDefault();
    var formdata = new FormData(this);
    formdata.append('client_id', user_id)
    axios.post(`${url}/save_package`, formdata).then(function(response) {
        // handle success
        if (response.data.type === 'success') {
            show_Toaster(response.data.message, response.data.type);
            location.reload()
        }
    }).catch(function(err) {
        show_Toaster(err.response.data.message, 'error')
    })
});


function show_payment_modal(data, type) {
    $('.package_payment').modal('show');
}

function close_payment_modal() {
    $('.package_payment').modal('hide');
}
</script>