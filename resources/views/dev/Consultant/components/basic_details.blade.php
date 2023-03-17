 <div class="card">
     <div class="card-header">
         <h4>Contact Details</h4>
     </div>
     <div class="card-body">
         <div class="row">
             <div class="col-md-3">
                 <div class="form-group">
                     <label>Mobile Number</label>
                     <input type="text" id="mobile" name="mobile" class="form-control"
                         value="{{ $user_data['mobile'] ?? '' }}">
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="form-group">
                     <label>Fullname</label>
                     <input type="text" name="name" class="form-control" value="{{ $user_data['name'] ?? '' }}">
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="form-group">
                     <label>Referred By
                     </label>
                     <input type="text" name="referrer" class="form-control" value="{{ $user_data['referrer'] ?? '' }}">
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="form-group">
                     <label>Gender</label>
                     <select name="gender" id="gender" class="form-control">
                         <option value="-1">choose</option>
                         <option value="male"
                             {{ isset($user_data['gender']) && $user_data['gender'] == 'male' ? 'selected' : '' }}>male
                         </option>
                         <option value="female"
                             {{ isset($user_data['gender']) &&  $user_data['gender'] == 'female' ? 'selected' : '' }}>
                             female</option>
                         <option value="other"
                             {{ isset($user_data['gender']) &&  $user_data['gender'] == 'other' ? 'selected' : '' }}>
                             other</option>
                     </select>
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="form-group">
                     <label>Email</label>
                     <input type="text" name="email" class="form-control" value="{{ $user_data['email'] ?? '' }}">
                 </div>
             </div>

             <div class="col-md-3">
                 <div class="form-group">
                     <label>Profession</label>
                     <input type="text" name="profession" class="form-control"
                         value="{{ $user_data['profession'] ?? '' }}">
                 </div>
             </div>

             <div class="col-md-3">
                 <div class="form-group">
                     <label>Working Hours</label>
                     <input type="text" name="working_hours" class="form-control"
                         value="{{ $user_data['working_hours'] ?? '' }}">
                 </div>
             </div>

             <div class="col-md-6">
                 <div class="form-group">
                     <label>Social Media Details</label>
                     <textarea type="text" id="social_media" name="social_media" class="form-control"
                         value="{{ $user_data['social_media'] ?? '' }}">{{ $user_data['social_media'] ?? '' }}</textarea>
                 </div>
             </div>
         </div>
         <hr>
         <div class="row">
             <div class="col-md-4">
                 <div class="form-group">
                     <label>Address</label>
                     <textarea type="text" id="address" name="address" class="form-control"
                         value="{{ $user_data['address'] ?? '' }}">{{ $user_data['address'] ?? '' }}</textarea>
                 </div>
             </div>
             <div class="col-md-2">
                 <div class="form-group">
                     <label>State</label>
                     <input type="text" name="state" class="form-control" value="{{ $user_data['state'] ?? '' }}">
                 </div>
             </div>
             <div class="col-md-2">
                 <div class="form-group">
                     <label>City</label>
                     <input type="text" name="city" class="form-control" value="{{ $user_data['city'] ?? '' }}">
                 </div>
             </div>

             <div class="col-md-2">
                 <div class="form-group">
                     <label>Pincode</label>
                     <input type="text" name="pincode" class="form-control" value="{{ $user_data['pincode'] ?? '' }}">
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
                     <input type="text" name="dob" class="form-control datepicker" value="{{ $user_data['dob'] ?? '' }}"
                         onchange="updateAge(this.value)" oninput="updateAge(this.value)">
                 </div>
             </div>
             <div class="col-md-1">
                 <div class="form-group">
                     <label>Age</label>
                     <input type="text" name="age" class="form-control" value="{{ $user_data['age'] ?? '' }}" readonly>
                 </div>
             </div>
             <div class="col-md-2">
                 <div class="form-group">
                     <label>Marital Status</label>
                     <select name="maritalstatus" id="maritalstatus" class="form-control">
                         <option value="single"
                             {{ isset($user_data['maritalstatus']) && $user_data['maritalstatus'] == 'single' ? 'selected' : '' }}>
                             Single
                         </option>
                         <option value="married"
                             {{ isset($user_data['maritalstatus']) && $user_data['maritalstatus'] == 'married' ? 'selected' : '' }}>
                             Married</option>
                     </select>
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="form-group">
                     <label>Purpose of visit</label>
                     <select name="purpose" id="purpose" class="form-control" onchange="checkSelectedValue(this.value)">
                         <option value="i want to lose weight"
                             {{ isset($user_data['purpose']) && $user_data['purpose'] == 'i want to lose weight' ? 'selected' : '' }}>
                             i want to
                             lose weight
                         </option>
                         <option value="i want to gain weight"
                             {{ isset($user_data['purpose']) && $user_data['purpose'] == 'i want to gain weight' ? 'selected' : '' }}>
                             i want to
                             gain weight
                         </option>
                         <option value="i want eat well-balanced meals to stay healthy and boost my immunity"
                             {{ isset($user_data['purpose']) && $user_data['purpose'] == 'i want eat well-balanced meals to stay healthy and boost my immunity' ? 'selected' : '' }}>
                             i want eat well-balanced
                             meals to
                             stay healthy and boost my immunity</option>
                         <option value="other"
                             {{ isset($user_data['purpose']) && $user_data['purpose'] == 'other' ? 'selected' : '' }}>
                             Other
                         </option>
                     </select>
                 </div>
             </div>
             <div class="col-md-3" id="purpose_other"
                 style="display: {{ isset($user_data['purpose']) && $user_data['purpose'] == 'other' ? 'block' : 'none' }};">
                 <div class="form-group">
                     <label>Purpose Other</label>
                     <input type="text" id="purpose_value_other" name="purpose_value_other" class="form-control"
                         value="{{ $user_data['purpose_other'] ?? '' }}">
                 </div>
             </div>
         </div>
     </div>
     <button id="saveUser" class="btn btn-primary">Save Changes</button>
 </div>