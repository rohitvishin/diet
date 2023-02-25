@include('dev.include.header')
@include('dev.include.sidebar')


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Activity Master List</h1>
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
                                            <th>Id</th>
                                            <th>Activity Name</th>
                                            <th>Created Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (count($data) != 0)
                                        @foreach ($data as $singleData)
                                        <tr>
                                            <td> {{ $singleData->id }} </td>
                                            <td> {{ $singleData->name }} </td>
                                            <td> {{ $singleData->created_at }} </td>
                                            <td> {{ $singleData->status == 1 ? 'Active' : 'Deactive' }} </td>
                                            <td><button href="#" onclick="updateStatus({{$singleData->id}},this)" class="btn btn-{{$singleData->status == 1 ? 'primary' : 'danger'}}">Update Status</button></td>
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
                        <div class="col-md-12">
                            <label for="">Enter Activity Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Activity Name">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="addActivityMaster" class="btn btn-primary">Save changes</button>
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
<script>
    $('#addActivityMaster').on('click',function(){
            const name=$('#name').val();
            axios.post(`${url}/client/addActivityMaster`,{name:name}).then(function (response) {
                // handle success
                show_Toaster(response.data.message,response.data.type)
                setTimeout(() => {
                            window.location.href = `${url}/client/activityMaster`;
                        }, 500);
                }).catch(function (err) {
                    show_Toaster(err.response.data.message,'error')
            })
    });
         function updateStatus(t_Id,e){
            axios.post(`${url}/client/updateActivityMaster`,{type_id:t_Id}).then(function (response) {
                // handle success
                show_Toaster(response.data.message,response.data.type)
                if(response.data.status==1){
                    $(e).removeClass('btn btn-primary');
                    $(e).addClass('btn btn-danger');
                }else{
                    $(e).removeClass('btn btn-danger');
                    $(e).addClass('btn btn-primary');
                }
                
            })
         }
</script>