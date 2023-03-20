@include('dev.include.header')
@include('dev.include.sidebar')

<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Clients</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalClient }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Payment</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalPayment }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Product Payment</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalProductPayment }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Appointments</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalAppointment }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Today's Appointments</h4>
                        </div>
                        <div class="card-body">
                            {{ $todayAppointmentCount  }}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Client Data</h4>
                        <div class="card-header-action">
                            <a class="btn btn-primary text-white" onclick="show_add_client_modal()">Add New Client +</a>
                            <a href="{{ url('/clientList') }}" class="btn btn-danger">View More <i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Sr NO.</th>
                                    <th>Client Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Gender</th>
                                </tr>

                                @if($clientData && !empty($clientData) && isset($clientData))
                                @if(count($clientData) > 0)

                                @php( $i = 1 )
                                @foreach($clientData as $singleClient)
                                <tr>
                                    <td>{{ $i++ }}
                                    </td>
                                    <td><a
                                            href="{{ url('/startAppointment/'.$singleClient['mobile'].'/basic_details/main') }}">{{ isset($singleClient['name']) && $singleClient['name'] ? $singleClient['name'] : '' }}
                                        </a></td>
                                    <td>{{ isset($singleClient['email']) && $singleClient['email'] ? $singleClient['email'] : '' }}
                                    </td>
                                    <td>{{ isset($singleClient['mobile']) && $singleClient['mobile'] ? $singleClient['mobile'] : '' }}
                                    </td>
                                    <td>{{ isset($singleClient['gender']) && $singleClient['gender'] && $singleClient['gender'] != -1 ? $singleClient['gender'] : '' }}
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                                @endif

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Today's Appointments</h4>
                        <div class="card-header-action">
                            <a href="{{ url('/appointments') }}" class="btn btn-danger">View More <i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Customer Name</th>
                                    <th>Appointment Date</th>
                                    <th>Appointment time</th>
                                    <th>Action</th>
                                </tr>

                                @if(!$todayAppointment->isEmpty())
                                @php($i = 1)
                                @foreach($todayAppointment as $singleAppointment)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td class="font-weight-600"><a
                                            href="{{ url('/startAppointment/'.$singleAppointment['client_mobile'].'/basic_details/main') }}"
                                            target="_blank">{{ $singleAppointment['client_name'] }}</a></td>
                                    <td>{{ date('M, d Y', strtotime($singleAppointment['appointment_date'])) }}</td>
                                    <td>{{ $singleAppointment['start_time'].' to '.$singleAppointment['end_time']  }}
                                    </td>
                                    <td><a href="#" class="btn btn-primary">Send Reminder</a></td>
                                </tr>
                                @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Payment Data</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Transaction No.</th>
                                    <th>Plan Name</th>
                                    <th>Customer Name</th>
                                    <th>Amount</th>
                                    <th>Payment Date</th>
                                    <th>Emi Count</th>
                                    <th>Download</th>
                                    <th>View</th>
                                </tr>

                                @if(count($payemntData) > 0)

                                @foreach($payemntData as $key => $singlePaymentData)
                                <tr>
                                    <td> {{ $key+1 }} </td>
                                    <td class="font-weight-600"> {{ $singlePaymentData['transaction_id'] }} </td>
                                    <td class="font-weight-600"> {{ $singlePaymentData['plan_name'] }} </td>
                                    <td class="font-weight-600"> {{ $singlePaymentData['name'] }} </td>
                                    <td>
                                        <div class="badge badge-warning">{{ $singlePaymentData['final_amt'] }}</div>
                                    </td>
                                    <td>{{ date('d, M Y',strtotime($singlePaymentData['payment_date'])) }}</td>
                                    <td class="font-weight-600"> {{ $singlePaymentData['no_emi'] }} </td>
                                    <td>
                                        <a href="{{ url('/download_invoice/'.$singlePaymentData['id'].'/'.$singlePaymentData['client_id']) }}"
                                            class="btn btn-sm btn-primary text-white">Download</a>
                                    </td>
                                    <td>
                                        <a target="_blank"
                                            href="{{ url('/view_invoice/'.$singlePaymentData['id'].'/'.$singlePaymentData['client_id']) }}"
                                            class="btn btn-sm btn-primary text-white">View</a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Pending Payment Data</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Transaction No.</th>
                                    <th>Plan Name</th>
                                    <th>Customer Name</th>
                                    <th>EMI Amount</th>
                                    <th>EMI Payment Date</th>
                                </tr>
                                @if(count($pendingPayment) > 0)

                                @foreach($pendingPayment as $key => $singlePaymentData)
                                <tr>
                                    <td> {{ $key+1 }} </td>
                                    <td class="font-weight-600"> {{ $singlePaymentData['transaction_id'] }} </td>
                                    <td class="font-weight-600"> {{ $singlePaymentData['plan_name'] }} </td>
                                    <td class="font-weight-600"> {{ $singlePaymentData['name'] }} </td>
                                    <td>
                                        <div class="badge badge-warning">{{ $singlePaymentData['emi_amt'] }}</div>
                                    </td>
                                    <td>{{ date('d, M Y',strtotime($singlePaymentData['emi_date'])) }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Product Payment Data</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Product Name</th>
                                    <th>Customer Name</th>
                                    <th>Product Amount</th>
                                    <th>Discount</th>
                                    <th>Final Amount</th>
                                    <th>Payment Date</th>
                                    <th>Download</th>
                                    <th>View</th>
                                </tr>
                                @if(count($productPayment) > 0)

                                @foreach($productPayment as $key => $singlePaymentData)
                                <tr>
                                    <td> {{ $key+1 }} </td>
                                    <td class="font-weight-600"> {{ $singlePaymentData['product_name'] }} </td>
                                    <td class="font-weight-600"> {{ $singlePaymentData['name'] }} </td>
                                    <td class="font-weight-600"> {{ $singlePaymentData['amount'] }} </td>
                                    <td class="font-weight-600"> {{ $singlePaymentData['discount'] }} </td>
                                    <td>
                                        <div class="badge badge-warning">{{ $singlePaymentData['final_amt'] }}</div>
                                    </td>
                                    <td>{{ date('d, M Y',strtotime($singlePaymentData['payment_date'])) }}</td>
                                    <td>
                                        <a href="{{ url('/download_product_invoice/'.$singlePaymentData['pay_id'].'/'.$singlePaymentData['client_id']) }}"
                                            class="btn btn-sm btn-primary text-white">Download</a>
                                    </td>
                                    <td>
                                        <a target="_blank"
                                            href="{{ url('/view_product_invoice/'.$singlePaymentData['pay_id'].'/'.$singlePaymentData['client_id']) }}"
                                            class="btn btn-sm btn-primary text-white">View</a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- Modal  -->
<!-- Add New Document -->
<div class="modal add_client bd-example-modal-xl" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="add_client_form">
                <div class="modal-body medicine-modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Client Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter Client Name">
                        </div>
                        <div class="col-md-6">
                            <label for="">Client Mobile Number</label>
                            <input type="text" id="mobile" name="mobile" class="form-control"
                                placeholder="Enter Client Mobile">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="close_add_client_modal()">Close</button>
                    <button id="saveClient" type="button" class="btn btn-primary">Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal  -->


@include('dev.include.footer')

<script>
function close_add_client_modal() {
    $('.add_client').modal('hide');
}

function show_add_client_modal() {
    $('.add_client').modal('show');
}


$('#saveClient').on('click', async function() {

    let data = new FormData(document.getElementById('add_client_form'));
    axios.post(`${url}/addClient`, data, {
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
</script>