@include('dev.include.header')
@include('dev.include.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Product Master List</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" onclick="show_modal()" class="btn btn-primary">Add New
                                Product</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Product Unit</th>
                                            <th>Product Price</th>
                                            <th>Product Discount</th>
                                            <th>Product Qty</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($data) > 0)
                                        @foreach ($data as $singleProduct)
                                        <tr>
                                            <td> {{ $singleProduct->product_name }} </td>
                                            <td> {{ $singleProduct->unit }} </td>
                                            <td> {{ $singleProduct->amount }} </td>
                                            <td> {{ $singleProduct->qty }} </td>
                                            <td> {{ $singleProduct->discount }} </td>
                                            <td>
                                                <button id="update_Status"
                                                    onclick="editFood('1','{{ $singleProduct }}')"
                                                    class="btn btn-primary">Edit</button>
                                                <button id="update_Status_{{ $singleProduct->id }}"
                                                    onclick="updateStatus('{{ $singleProduct->id }}',this)"
                                                    class="btn {{ $singleProduct->status == 1 ? 'btn-danger' : 'btn-success' }}">Update
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
                <form id="productForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add New Product</h5>
                        <button type="button" class="close" onclick="close_modal()" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Product Name</label>
                                <input type="text" id="product_name" name="product_name" class="form-control"
                                    placeholder="Product Title">
                            </div>
                            <div class="col-md-6">
                                <label for="">Product Unit</label>
                                <input type="text" id="unit" name="unit" class="form-control"
                                    placeholder="Product Unit">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <label for="">Product Amount</label>
                                <input type="text" id="amount" name="amount" class="form-control"
                                    placeholder="Product Amount">
                            </div>
                            <div class="col-md-3">
                                <label for="">Product Qty</label>
                                <input type="text" id="qty" name="qty" class="form-control" placeholder="Product Qty">
                            </div>
                            <div class="col-md-3">
                                <label for="">Discount</label>
                                <input type="text" id="discount" name="discount" class="form-control"
                                    placeholder="Product Discount">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="close_modal()">Close</button>
                        <button type="button" id="addProductMaster" data-action="add" name="submit"
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
    document.getElementById("productForm").reset();
    $('#addProductMaster').attr('data-action', 'add');
    $('.modal').modal('show');
}

function close_modal() {
    document.getElementById("productForm").reset();
    $('.modal').modal('hide');
    $('#addProductMaster').attr('data-action', 'add');
};

function editFood(id, data) {
    data = JSON.parse(data);
    $('#product_name').val(data.product_name);
    $('#unit').val(data.unit);
    $('#amount').val(data.amount);
    $('#qty').val(data.qty);
    $('#discount').val(data.discount);
    $('#addProductMaster').val(data.id);
    $('#addProductMaster').attr('data-action', 'edit');
    $('.modal').modal('show');
}

$('#addProductMaster').on('click', function() {
    var product_name = $('#product_name').val();
    var unit = $('#unit').val();
    var amount = $('#amount').val();
    var qty = $('#qty').val();
    var discount = $('#discount').val();
    var processAction = $('#addProductMaster').attr('data-action');
    var id = $('#addProductMaster').val();

    $('#addProductMaster').text('Please wait...');
    axios.post(`{{ url('/productMasterPost') }}`, {
        product_name,
        unit,
        amount,
        qty,
        discount,
        processAction,
        id
    }).then(function(response) {
        // handle success
        show_Toaster(response.data.message, response.data.type)
        setTimeout(() => {
            window.location.href = `{{ url('/productMaster') }}`;
        }, 500);
    }).catch(function(err) {
        show_Toaster(err.response.data.message, 'error')
    })
});

function updateStatus(t_Id, e) {
    $(e).text('Please Wait...');
    axios.post(`{{ url('/updateProductMasterStatus') }}`, {
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