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
                            {{ !empty($clientData) ? count($clientData) : 0 }}
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
                            {{ !empty($payemntData) ? count($payemntData) : 0 }}
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
                            {{ !empty($appointmentData) ? count($appointmentData) : 0 }}
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
                            {{ !empty($todayAppointment) ? count($todayAppointment) : 0}}
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
                                    <td>{{ isset($singleClient['gender']) && $singleClient['gender'] ? $singleClient['gender'] : '' }}
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
                            <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
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
                        <div class="card-header-action">
                            <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Customer Name</th>
                                    <th>Amount</th>
                                    <th>Payment Date</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td><a href="#">1</a></td>
                                    <td class="font-weight-600">Shree Vyas</td>
                                    <td>
                                        <div class="badge badge-warning">5000</div>
                                    </td>
                                    <td>July 19, 2022</td>
                                    <td><a href="#" class="btn btn-primary">Invoice</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">2</a></td>
                                    <td class="font-weight-600">Shree Vyas</td>
                                    <td>
                                        <div class="badge badge-warning">5000</div>
                                    </td>
                                    <td>July 19, 2022</td>
                                    <td><a href="#" class="btn btn-primary">Invoice</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">3</a></td>
                                    <td class="font-weight-600">Shree Vyas</td>
                                    <td>
                                        <div class="badge badge-warning">5000</div>
                                    </td>
                                    <td>July 19, 2022</td>
                                    <td><a href="#" class="btn btn-primary">Invoice</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">4</a></td>
                                    <td class="font-weight-600">Shree Vyas</td>
                                    <td>
                                        <div class="badge badge-warning">5000</div>
                                    </td>
                                    <td>July 19, 2022</td>
                                    <td><a href="#" class="btn btn-primary">Invoice</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">5</a></td>
                                    <td class="font-weight-600">Shree Vyas</td>
                                    <td>
                                        <div class="badge badge-warning">5000</div>
                                    </td>
                                    <td>July 19, 2022</td>
                                    <td><a href="#" class="btn btn-primary">Invoice</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Pending Payment Data</h4>
                        <div class="card-header-action">
                            <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Customer Name</th>
                                    <th>Amount</th>
                                    <th>Payment Date</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td><a href="#">1</a></td>
                                    <td class="font-weight-600">Shree Vyas</td>
                                    <td>
                                        <div class="badge badge-warning">5000</div>
                                    </td>
                                    <td>July 19, 2022</td>
                                    <td><a href="#" class="btn btn-primary">Send Reminder</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">2</a></td>
                                    <td class="font-weight-600">Shree Vyas</td>
                                    <td>
                                        <div class="badge badge-warning">5000</div>
                                    </td>
                                    <td>July 19, 2022</td>
                                    <td><a href="#" class="btn btn-primary">Send Reminder</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">3</a></td>
                                    <td class="font-weight-600">Shree Vyas</td>
                                    <td>
                                        <div class="badge badge-warning">5000</div>
                                    </td>
                                    <td>July 19, 2022</td>
                                    <td><a href="#" class="btn btn-primary">Send Reminder</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">4</a></td>
                                    <td class="font-weight-600">Shree Vyas</td>
                                    <td>
                                        <div class="badge badge-warning">5000</div>
                                    </td>
                                    <td>July 19, 2022</td>
                                    <td><a href="#" class="btn btn-primary">Send Reminder</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">5</a></td>
                                    <td class="font-weight-600">Shree Vyas</td>
                                    <td>
                                        <div class="badge badge-warning">5000</div>
                                    </td>
                                    <td>July 19, 2022</td>
                                    <td><a href="#" class="btn btn-primary">Send Reminder</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('dev.include.footer')