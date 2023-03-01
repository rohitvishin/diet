<div class="card">
    <div class="card-body">
        <form id="packageForm">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Package Type</label>
                        <select name="package_masters" id="package_masters" class="form-control">
                            <option value="flat">Flat Fee</option>
                            <option value="package_masters">Package</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Select Package</label>
                        <select name="select_package" id="select_package" class="form-control">
                           
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Select Duration</label>
                        <select name="duration" id="duration" class="form-control">
                            <option value="">1 Week</option>
                            <option value="">1 Month</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Select Currency</label>
                        <select name="currency" id="currency" class="form-control">
                            <option value="">USD</option>
                            <option value="">INR</option>
                        </select>
                    </div>
                </div>
            </div>
    
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Amount</label>
                        <input type="text" id="amount" placeholder="Enter Amount" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Discount %</label>
                        <input type="text" id="discount" placeholder="Enter Discount %" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Tax %</label>
                        <input type="text" id="tax" placeholder="Enter Tax %" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Final Amount</label>
                        <input type="text" id="final" placeholder="Amount - (Discount %) + (Tax %)" class="form-control">
                    </div>
                </div>
            </div>
    
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Start Date</label>
                        <input type="date" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Confirmation Date</label>
                        <input type="date" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Payment Method</label>
                        <select name="" id="" class="form-control">
                            <option value="">Cash</option>
                            <option value="">Cheque</option>
                            <option value="">Card</option>
                            <option value="">Net Banking</option>
                            <option value="">Paytm</option>
                            <option value="">UPI</option>
                            <option value="">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Transaction Number / ID</label>
                        <input type="text" name="" id="" placeholder="Enter Transaction Number"
                            class="form-control">
                    </div>
                </div>
            </div>
    
    
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h6>Partial Payment ? <input type="checkbox" name="" id=""></h6>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">No. of Installment</label>
                        <input type="text" name="" class="form-control" placeholder="No. of Installment"
                            id="installment_no">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Initial Payment</label>
                        <input type="text" name="" class="form-control" placeholder="Enter Initial Amount"
                            id="down_payment">
                    </div>
                </div>
            </div>
    
            <div class="card">
                <i class="fa fa-plus" style="text-align: right;margin-right: 200px;" id="add_container"> Add Installment</i>
                <div class="card-body" id="main_container">
                   
                </div>
            </div>
            <button id="savePayment" class="btn btn-primary">Save Changes</button>
        </form>

    </div>
</div>

