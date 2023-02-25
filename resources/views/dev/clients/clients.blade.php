@include('dev.include.header')
@include('dev.include.sidebar')


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Clients List</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Search by filter</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder="Search By Client Name">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder="Search By File Number">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder="Search By Date">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder="Search By Contact Number">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder="Search By Refered By">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" name="search_client"
                                            class="btn btn-lg btn-primary">Search</button>
                                        <button type="submit" name="search_client" class="btn btn-lg btn-primary">Clear
                                            Feilds</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <!-- <th class="text-center">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th> -->
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Age</th>
                                            <th>Address</th>
                                            <th>Reference</th>
                                            <th>Register Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if($clientData && !empty($clientData) && isset($clientData))
                                        @if(count($clientData) > 0)

                                        @php( $i = 1 )
                                        @foreach($clientData as $singleClient)
                                        <tr>
                                            <td>{{ $i++ }}
                                            </td>
                                            <td><a
                                                    href="{{ url('/startAppointment/'.str_replace(' ','_',$singleClient['name']).'/basic_details/main') }}">{{ isset($singleClient['name']) && $singleClient['name'] ? $singleClient['name'] : '' }}</a>
                                            </td>
                                            <td>{{ isset($singleClient['email']) && $singleClient['email'] ? $singleClient['email'] : '' }}
                                            </td>
                                            <td>{{ isset($singleClient['mobile']) && $singleClient['mobile'] ? $singleClient['mobile'] : '' }}
                                            </td>
                                            <td>{{ isset($singleClient['age']) && $singleClient['age'] ? $singleClient['age'] : '' }}
                                            </td>
                                            <td>{{ isset($singleClient['address']) && $singleClient['address'] ? $singleClient['address'] : '' }}
                                            </td>
                                            <td>{{ isset($singleClient['referrer']) && $singleClient['referrer'] ? $singleClient['referrer'] : '' }}
                                            </td>
                                            <td>{{ isset($singleClient['created_at']) && $singleClient['created_at'] ? date('D, M Y', strtotime($singleClient['created_at'])) : '' }}
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

@include('dev.include.footer')