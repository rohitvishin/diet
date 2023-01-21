@include('dev.include.header')
@include('dev.include.sidebar')


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Food Master List</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Diet Template Master</h4>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <table class="table-responsive table table-sm table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>Plan Name</th>
                                            <th>Plan Intro</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (count($data) > 0)
                                        @foreach ($data as $singleFood)
                                        <tr>
                                            <td> {{ $singleFood->plan_name }} </td>
                                            <td> {{ $singleFood->plan_intro }} </td>
                                            <td>
                                                <button id="update_Status" onclick="editFood('1','{{ $singleFood }}')"
                                                    class="btn btn-primary">View</button>
                                                <button id="update_Status" onclick="editFood('1','{{ $singleFood }}')"
                                                    class="btn btn-primary">Edit</button>
                                                <button id="update_Status_{{ $singleFood->id }}"
                                                    onclick="updateStatus('{{ $singleFood->id }}',this)"
                                                    class="btn {{ $singleFood->status == 1 ? 'btn-danger' : 'btn-success' }}">Update
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
                <div class="col-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create New Template</h4>
                            <button class="btn btn-primary" onclick="show_modal()">Add New Div</button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Enter Plan Name</label>
                                    <input type="text" placeholder="Enter Plan Name" class="form-control">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="">Enter Plan Introduction</label>
                                    <textarea type="text" placeholder="Enter Plan Introduction"
                                        class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row"></div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Save Template</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Modal  -->
    <div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="foodForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add New Feild</h5>
                        <button type="button" class="close" onclick="close_modal()" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-4 b-1">
                            <div class="col-md-6">
                                <label for="">Enter Heading</label>
                                <input type="text" id="heading" name="heading" class="form-control"
                                    placeholder="Enter Heading">
                            </div>
                            <div class="col-md-6">
                                <label for="">Time</label>
                                <input type="time" id="time" name="time" class="form-control" placeholder="Carbs (GM)">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Food Name</label>
                                <input type="text" id="food[unit][0]" name="food[unit][0]" class="form-control"
                                    placeholder="Fats (GM)">
                            </div>
                            <div class="col-md-6">
                                <label for="">Unit</label>
                                <input type="text" id="food[unit][0]" name="food[unit][0]" class="form-control"
                                    placeholder="Fiber (GM)">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="close_modal()">Close</button>
                        <button type="button" id="addFoodMaster" data-action="add" name="submit"
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
    document.getElementById("foodForm").reset();
    $('#addFoodMaster').attr('data-action', 'add');
    $('.modal').modal('show');
}

function close_modal() {
    document.getElementById("foodForm").reset();
    $('.modal').modal('hide');
    $('#addFoodMaster').attr('data-action', 'add');
};

function editFood(id, data) {
    data = JSON.parse(data);
    $('#food_name').val(data.food_name);
    $('#calories').val(data.calories);
    $('#protein').val(data.protein);
    $('#carbs').val(data.carbs);
    $('#fats').val(data.fats);
    $('#fiber').val(data.fiber);
    $('#addFoodMaster').val(data.id);
    $('#addFoodMaster').attr('data-action', 'edit');
    $('.modal').modal('show');
}
</script>

<script>
$('#addFoodMaster').on('click', function() {
    var food_name = $('#food_name').val();
    var calories = $('#calories').val();
    var protein = $('#protein').val();
    var carbs = $('#carbs').val();
    var fats = $('#fats').val();
    var fiber = $('#fiber').val();
    var processAction = $('#addFoodMaster').attr('data-action');
    var id = $('#addFoodMaster').val();

    $('#addFoodMaster').text('Please wait...');
    axios.post(`{{ url('/foodPost') }}`, {
        food_name,
        calories,
        protein,
        carbs,
        fats,
        fiber,
        processAction,
        id
    }).then(function(response) {
        // handle success
        show_Toaster(response.data.message, response.data.type)
        setTimeout(() => {
            window.location.href = `{{ url('/foodMaster') }}`;
        }, 500);
    }).catch(function(err) {
        show_Toaster(err.response.data.message, 'error')
    })
});

function updateStatus(t_Id, e) {

    $(e).text('Please Wait...');
    axios.post(`{{ url('/updateFoodMasterStatus') }}`, {
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