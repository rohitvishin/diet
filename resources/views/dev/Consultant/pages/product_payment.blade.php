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

.autocomplete-div {
    border: 1px solid #d4d4d4;
    border-bottom: none;
    border-top: none;
    z-index: 99;
    /*position the autocomplete items to be the same width as the container:*/
    top: 100%;
    left: 0;
    right: 0;
    padding: 10px;
    cursor: pointer;
    border-bottom: 1px solid #d4d4d4;
    margin-bottom: 0px;
}

#data {
    max-height: 150px;
    overflow-y: scroll;
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
                                <div class="tab-pane fade show active" id="product_payment" role="tabpanel"
                                    aria-labelledby="contact-tab3">
                                    @include('dev.consultant.components.product_payment')
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
                                        <label for="">Product Purchase Date</label>
                                        <input type="date" id="payment_date" name="payment_date"
                                            value="{{ date('Y-m-d') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Select Currency</label>
                                        <select name="currency" id="currency" class="form-control">
                                            <option value="USD">USD</option>
                                            <option value="INR">INR</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Select Product</label>
                                        <input type="text" name="product[0][product_name]" id="product_name_0"
                                            class="form-control" placeholder="Product Name"
                                            oninput="getProductName(this,0)">
                                        <input type="hidden" id="product_id_0" name="product[0][product_id]">
                                        <div id="data-0"></div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Amount</label>
                                        <input type="text" id="amount_0" name="product[0][amount]"
                                            oninput="calculateFinalAmount(0)" placeholder="Amount" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Discount %</label>
                                        <input type="text" id="discount_0" oninput="calculateFinalAmount(0)"
                                            name="product[0][discount]" placeholder="Discount %" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Qty</label>
                                        <input type="text" id="qty_0" oninput="calculateFinalAmount(0)" value="1"
                                            name="product[0][qty]" placeholder="QTY" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Final Amount</label>
                                        <input type="text" name="product[0][final_amt]" id="final_amt_0"
                                            placeholder="Final Amt" class="form-control" readonly>
                                    </div>
                                </div>

                            </div>
                            <div id="product-div"></div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Final Amount</label>
                                        <input type="text" name="final_amt" id="final_amt" placeholder="Final Amt"
                                            class="form-control" readonly>
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
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="addNewProduct" onclick="addProductDiv(this)"
                        data-key="0">Add
                        Another Product</button>
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

$('.nav-link').click(async function() {
    var url = $(this).attr('data-url');
    window.location.href = `{{ url('startAppointment/${mobile}/${url}') }} `
});

function setProductName(e) {
    var key = $(e).attr('data-key');
    var product_name = $(e).attr('data-name')
    var amount = $(e).attr('data-amt')
    var discount = $(e).attr('data-discount')
    var id = $(e).attr('data-id')
    $(`#product_name_${key}`).val(product_name)
    $(`#amount_${key}`).val(amount)
    $(`#discount_${key}`).val(discount)
    $(`#qty_${key}`).val(1)
    $(`#product_id_${key}`).val(id)
    document.getElementById(`data-${key}`).innerHTML = '';
    calculateFinalAmount()
}

function getProductName(e, key) {
    var formdata = new FormData();
    formdata.append('param', $(e).val());
    formdata.append('key', key);
    axios.post(`${url}/getProductName`, formdata).then(function(response) {
        document.getElementById(`data-${key}`).innerHTML = '';
        $(`#data-${key}`).append(response.data.html)
    }).catch(function(err) {
        show_Toaster(err.response.data.message, 'error')
    })
}

function calculateFinalAmount() {
    var keyCount = $('#addNewProduct').attr('data-key');
    var final_amt = 0;
    for (var i = 0; i <= keyCount; i++) {
        var qty = parseInt($(`#qty_${i}`).val() || 0);
        var discount = parseInt($(`#discount_${i}`).val() || 0) * qty;
        var amount = parseInt($(`#amount_${i}`).val() || 0) * qty;
        var final_price = amount - (amount * discount / 100);
        final_amt = parseInt(final_amt) + parseInt(final_price);
        $(`#final_amt_${i}`).val(final_price);
    }

    $('#final_amt').val(final_amt);

}

function addProductDiv(e) {
    var key = $(e).attr('data-key');
    var newkey = parseInt(key) + 1;
    var html = `<div class="row product_div_${newkey}">
        
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Select Product</label>
                <input type="text" name="product[${newkey}][product_name]" id="product_name_${newkey}"
                    class="form-control" placeholder="Product Name"
                    oninput="getProductName(this,${newkey})">
                <input type="hidden" id="product_id_${newkey}" name="product[${newkey}][product_id]">
                <div id="data-${newkey}"></div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="">Amount</label>
                <input type="text" id="amount_${newkey}" name="product[${newkey}][amount]"
                    oninput="calculateFinalAmount(${newkey})" placeholder="Amount" class="form-control">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="">Discount %</label>
                <input type="text" id="discount_${newkey}" oninput="calculateFinalAmount(${newkey})"
                    name="product[${newkey}][discount]" placeholder="Discount %" class="form-control">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="">Qty</label>
                <input type="text" id="qty_${newkey}" oninput="calculateFinalAmount(${newkey})" value="1"
                    name="product[${newkey}][qty]" placeholder="QTY" class="form-control">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="">Final Amount</label>
                <input type="text" name="product[${newkey}][final_amt]" id="final_amt_${newkey}"
                    placeholder="Final Amt" class="form-control" readonly>
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <i class="fa fa-trash" onclick="removeProductDiv('${newkey}')"></i>
            </div>
        </div>        
    </div>`

    $('#product-div').append(html)
    $(e).attr('data-key', newkey)
}


function removeProductDiv(key) {
    $(`.product_div_${key}`).remove();
    calculateFinalAmount()
}

$('#packageForm').submit(function(e) {
    e.preventDefault();
    var formdata = new FormData(this);
    formdata.append('client_id', user_id)
    axios.post(`${url}/save_product_payment`, formdata).then(function(response) {
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