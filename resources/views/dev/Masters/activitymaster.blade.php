@include('dev.include.header')
@include('dev.include.sidebar')


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Medical Master List</h1>
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
                                            <th>Type Name</th>
                                            <th>Medical Name</th>
                                            <th>Created Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (count($data) != 0)
                                        @foreach ($data as $singleData)
                                        <tr>
                                            <td> {{ $singleData->type }} </td>
                                            <td> {{ $singleData->name }} </td>
                                            <td> {{ $singleData->created_at }} </td>
                                            <td> {{ $singleData->status == 1 ? 'Active' : 'Deactive' }} </td>
                                            <td><a href="#" class="btn btn-primary">Update Status</a></td>
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
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add New Feild</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Enter Type Name</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Enter Type Name">
                        </div>
                        <div class="col-md-6">
                            <label for="">Enter Value Name</label>
                            <input type="text" class="form-control" placeholder="Enter Master Name">
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


</div>

@include('dev.include.footer')

<script>
function show_modal() {
    $('.modal').modal('show');
}
</script>