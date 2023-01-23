 <div class="card">
     <div class="card-header">
         <h4>Contact Details</h4>
     </div>
     <div class="card-body">
         <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Mobile Number</label>
                    <input type="text" id="mobile" name="mobile" class="form-control">
                </div>
            </div>
             <div class="col-md-3">
                 <div class="form-group">
                     <label>Fullname</label>
                     <input type="text" name="name" class="form-control">
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="form-group">
                     <label>Referred By
                     </label>
                     <input type="text" name="referrer" class="form-control">
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="form-group">
                     <label>Gender</label>
                     <select name="gender" id="gender" class="form-control">
                        <option>choose</option>
                        <option>male</option>
                        <option>female</option>
                        <option>other</option>
                     </select>
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="form-group">
                     <label>Email</label>
                     <input type="text" name="email" class="form-control">
                 </div>
             </div>
         </div>
         <hr>
         <div class="row">
             <div class="col-md-4">
                 <div class="form-group">
                     <label>Address</label>
                     <textarea type="text" id="address" name="address" class="form-control"></textarea>
                 </div>
             </div>
             <div class="col-md-2">
                <div class="form-group">
                    <label>State</label>
                    <input type="text" name="state" class="form-control">
                </div>
            </div>
             <div class="col-md-2">
                 <div class="form-group">
                     <label>City</label>
                     <input type="text" name="city" class="form-control">
                 </div>
             </div>
             
             <div class="col-md-2">
                 <div class="form-group">
                     <label>Pincode</label>
                     <input type="text" name="pincode" class="form-control">
                 </div>
             </div>
         </div>
     </div>
 </div>
 <div class="card">
    <div class="card-header">
        <h4>Personal & Occupation Details</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label>D.O.B</label>
                    <input type="date" name="dob" class="form-control">
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label>Age</label>
                    <input type="text" name="age" class="form-control">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Marital Status</label>
                    <select name="maritalstatus" id="maritalstatus" class="form-control">
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Purpose of visit</label>
                    <select name="purpose" id="purpose" class="form-control">
                        <option value="i want to lose weight">i want to lose weight</option>
                        <option value="i want to gain weight">i want to gain weight</option>
                        <option value="i want eat well-balanced meals to
                        stay healthy and boost my immunity">i want eat well-balanced meals to
                            stay healthy and boost my immunity</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="client_id" id="client_id">
        </div>
    </div>
    <button id="saveUser" class="btn btn-primary">Save Changes</button>
 </div>
