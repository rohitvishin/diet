@include('dev.include.header')
@include('dev.include.sidebar')


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Package Master List</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" onclick="show_modal()" class="btn btn-primary">Add New</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>Package Name</th>
                                            <th>Duration</th>
                                            <th>Discount</th>
                                            <th>Amount</th>
                                            <th>Currency</th>
                                            <th>Tax</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (count($data) > 0)
                                            @foreach ($data as $singlePackage)
                                                <tr>
                                                    <td> {{ $singlePackage->plan_name }} </td>
                                                    <td> {{ $singlePackage->duration }} </td>
                                                    <td> {{ $singlePackage->discount }} </td>
                                                    <td> {{ $singlePackage->amount }} </td>
                                                    <td> {{ $singlePackage->currency }} </td>
                                                    <td> {{ $singlePackage->tax }} </td>
                                                    <td>
                                                        <button id="update_Status"
                                                            onclick="editPackage('1','{{ $singlePackage }}')"
                                                            class="btn btn-primary">Edit</button>
                                                        <button id="update_Status"
                                                            onclick="updateStatus('{{ $singlePackage->id }}',this)"
                                                            class="btn btn-{{ $singlePackage->status == 1 ? 'danger' : 'success' }}">Update
                                                            Status</button>
                                                    </td>
                                                </tr>
                                            @endforeach
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

    <!-- Modal  -->
    <div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="packageForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add New Package</h5>
                        <button type="button" class="close" onclick="close_modal()" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Package Title</label>
                                <input type="text" id="plan_name" name="name" class="form-control"
                                    placeholder="Enter Package Title">
                            </div>
                            <div class="col-md-6">
                                <label for="">Enter Package Durations(days)</label>
                                <input type="text" id="duration" name="duration" class="form-control"
                                    placeholder="Package Durations(days)">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <label for="">Package Discount (%)</label>
                                <input type="text" id="discount" name="discount" class="form-control"
                                    placeholder="Enter Package Discount (%)">
                            </div>
                            <div class="col-md-4">
                                <label for="">Package Amount</label>
                                <input type="text" id="amount" name="amount" class="form-control"
                                    placeholder="Package Durations(days)">
                            </div>
                            <div class="col-md-2">
                                <label for="">Currency</label>
                                <input type="text" id="currency" name="currency" class="form-control"
                                    placeholder="Package Durations(days)">
                            </div>
                            <div class="col-md-2">
                                <label for="">Tax (%)</label>
                                <input type="text" id="tax" name="tax" class="form-control"
                                    placeholder="Package Durations(days)">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="close_modal()">Close</button>
                        <button type="button" id="addPackageMaster" data-action="add" name="submit"
                            class="btn btn-primary">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal  -->


</div>

@include('dev.include.footer')

<script>
    function show_modal() {
        document.getElementById("packageForm").reset();
        $('#addPackageMaster').attr('data-action', 'add');
        $('.modal').modal('show');
    }

    function close_modal() {
        document.getElementById("packageForm").reset();
        $('.modal').modal('hide');
        $('#addPackageMaster').attr('data-action', 'add');
    };

    function editPackage(id, data) {
        data = JSON.parse(data);
        $('#plan_name').val(data.plan_name);
        $('#duration').val(data.duration);
        $('#discount').val(data.discount);
        $('#amount').val(data.amount);
        $('#currency').val(data.currency);
        $('#tax').val(data.tax);
        $('#addPackageMaster').val(data.id);
        $('#addPackageMaster').attr('data-action', 'edit');
        $('.modal').modal('show');
    }
</script>

<script>
    $('#addPackageMaster').on('click', function() {
        var plan_name = $('#plan_name').val();
        var duration = $('#duration').val();
        var discount = $('#discount').val();
        var amount = $('#amount').val();
        var currency = $('#currency').val();
        var tax = $('#tax').val();
        var processAction = $('#addPackageMaster').attr('data-action');
        var id = $('#addPackageMaster').val();

        $('#addPackageMaster').text('Please wait...');
        axios.post(`{{ url('/packagePost') }}`, {
            plan_name,
            duration,
            discount,
            amount,
            currency,
            tax,
            processAction,
            id
        }).then(function(response) {
            // handle success
            show_Toaster(response.data.message, response.data.type)
            setTimeout(() => {
                window.location.href = `{{ url('/packageMaster') }}`;
            }, 500);
        }).catch(function(err) {
            show_Toaster(err.response.data.message, 'error')
        })
    });

    function updateStatus(t_Id, e) {

        $(e).text('Please Wait...');
        axios.post(`{{ url('/updatePackageMaster') }}`, {
            type_id: t_Id
        }).then(function(response) {
            // handle success
            show_Toaster(response.data.message, response.data.type)
            if (response.data.status == 1) {
                $(e).removeClass('btn btn-success ')
                $(e).addClass('btn btn-danger ');
            } else {
                $(e).removeClass('btn btn-danger ')
                $(e).addClass('btn btn-success ');
            }

        })
        $(e).text('Update Status');
    }
</script>
