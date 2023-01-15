@include('dev.include.header')
@include('dev.include.sidebar')


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Lab Master List</h1>
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
                                            <th>Test Type</th>
                                            <th>Test Name</th>
                                            <th>Subject</th>
                                            <th>Subject Value</th>
                                            <th>Subject Value Action</th>
                                            <th>Result Low Range</th>
                                            <th>Result High Range</th>
                                            <th>Unit</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (count($data) != 0)
                                        @foreach ($data as $singleData)
                                        <tr>
                                            <td> {{ $singleData->test_type }} </td>
                                            <td> {{ $singleData->test_name }} </td>
                                            <td> {{ $singleData->subject }} </td>
                                            <td> {{ $singleData->subject_value }} </td>
                                            <td> {{ $singleData->subject_value_action }} </td>
                                            <td> {{ $singleData->result_low_range }} </td>
                                            <td> {{ $singleData->result_high_range }} </td>
                                            <td> {{ $singleData->unit }} </td>
                                            <td> {{ $singleData->status == 1 ? 'Active' : 'Deactive' }} </td>
                                            <td><button href="button" onclick="updateStatus({{$singleData->id}},this)" class="btn btn-{{$singleData->status == 1 ? 'primary' : 'danger'}}">Update Status</button></td>
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
                <form id="addLabMaster">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add New Feild</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Enter Test Type</label>
                                <input type="text" name="test_type" id="test_type" class="form-control" placeholder="Enter Test Type">
                            </div>
                            <div class="col-md-6">
                                <label for="">Enter Test Name</label>
                                <input type="text" name="test_name" id="test_name" class="form-control" placeholder="Enter Type Name">
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2">
    
                            <div class="col-md-12">
                                <h6>Refernce Details</h6>
                            </div>
                            <div class="col-md-6">
                                <label for="">Select Reference</label>
                                <select name="subject" id="subject" class="form-control">
                                    <option value="age">Age</option>
                                    <option value="gender">Gender</option>
                                    <option value="0">None</option>
                                </select>
                            </div>
                            <div class="col-md-6" id="subject_action_div">
                                <label for="">Select Reference Condition</label>
                                <select name="subject_value_action" id="subject_value_action" class="form-control">
                                    <option value="0">Less Than</option>
                                    <option value="1">Greater Than</option>
                                    <option value="2">Between</option>
                                    <option value="-1">None</option>
                                </select>
                            </div>
                            <div class="col-md-6" id="subject_value_div">
                                <label for="">Enter Reference Value</label>
                                <input type="text" name="subject_value" id="subject_value" class="form-control" placeholder="Enter Reference Value">
                            </div>
                        </div>
    
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h6>Test Result Details</h6>
                            </div>
                            <div class="col-md-6">
                                <label for="">Enter Low Range Value</label>
                                <input type="text" name="result_low_range" id="result_low_range" class="form-control" placeholder="Enter Low Range Value">
                            </div>
                            <div class="col-md-6">
                                <label for="">Enter High Range Value</label>
                                <input type="text" name="result_high_range" id="result_high_range" class="form-control" placeholder="Enter High Range Value">
                            </div>
                            
                            <div class="col-md-6">
                                <label for="">Enter Test Unit</label>
                                <input type="text" name="unit" id="unit" class="form-control" placeholder="Enter Test Unit">
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


</div>

@include('dev.include.footer')

<script>
function show_modal() {
    $('.modal').modal('show');
}
    $('#addLabMaster').on('submit',function(e){
        e.preventDefault();
        axios.post(`${url}/client/addLabMaster`,new FormData(this)).then(function (response) {
                // handle success
                show_Toaster(response.data.message,response.data.type)
                if (response.data.type === 'success') {
                    setTimeout(() => {
                        window.location.href = `${url}/client/home`;
                    }, 500);
                }
            }).catch(function (err) {
                show_Toaster(err.response.data.message,'error')
        })
     });
     $('#subject').change(function(){
        if($('#subject').val()=='gender'){
            $('#subject_action_div').css('display','none');
        }
        else if($('#subject').val()=='age'){
            $('#subject_action_div').css('display','block');
        }else{
            $('#subject_action_div').css('display','none');
            $('#subject_value_div').css('display','none');
        }      
     });
     function updateStatus(t_Id,e){
            axios.post(`${url}/client/updateLabMaster`,{id:t_Id}).then(function (response) {
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
