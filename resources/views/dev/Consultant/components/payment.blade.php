<div class="card">
    <div class="card-body">
        <form id="packageForm">
            @csrf
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
                        <select name="package_id" id="select_package" class="form-control">
                            <option value="">Diet Program</option>
                            <option value="">Weight Program</option>
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
                        <input type="text" id="amount" name="amount" placeholder="Enter Amount" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Discount %</label>
                        <input type="text" id="discount" name="discount" placeholder="Enter Discount %" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Tax %</label>
                        <input type="text" name="tax" id="tax" placeholder="Enter Tax %" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Final Amount</label>
                        <input type="text" name="final_amt" id="final" placeholder="Amount - (Discount %) + (Tax %)" class="form-control">
                    </div>
                </div>
            </div>
    
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Confirmation Date</label>
                        <input type="date" name="confirmation_date" id="confirmation_date" class="form-control">
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
                        <input type="text" name="transaction_id" id="transaction_id" placeholder="Enter Transaction Number"
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
                        <input type="text" name="no_emi" class="form-control" placeholder="No. of Installment"
                            id="installment_no">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Initial Payment</label>
                        <input type="text" name="down_payment" class="form-control" placeholder="Enter Initial Amount"
                            id="down_payment">
                    </div>
                </div>
            </div>
    
            <div class="card">
                <i class="fa fa-plus" style="text-align: right;margin-right: 200px;" id="add_container"> Add Installment</i>
                <div class="card-body" id="main_container">
                   
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>

    </div>
</div>

