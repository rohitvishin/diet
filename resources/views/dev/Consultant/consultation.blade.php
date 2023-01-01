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
                <div class="col-12 col-sm-5 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Client Details</h4>
                        </div>
                        <div class="card-body">
                            <!-- <div class="row flex-row flex-nowrap">
                                
                            </div> -->
                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#basicdetails"
                                        role="tab" aria-controls="home" aria-selected="true">Patient Basic
                                        Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#medicalhistory"
                                        role="tab" aria-controls="profile" aria-selected="false">Medical history</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#payment" role="tab"
                                        aria-controls="contact" aria-selected="false">Package &
                                        Payment</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab"
                                        aria-controls="contact" aria-selected="false">Diet Chart</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab"
                                        aria-controls="contact" aria-selected="false">Remarks</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#followup" role="tab"
                                        aria-controls="contact" aria-selected="false">Follow ups</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab"
                                        aria-controls="contact" aria-selected="false">Documents &
                                        Photos</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <!-- Basic Details -->
                                <div class="tab-pane fade show active" id="basicdetails" role="tabpanel"
                                    aria-labelledby="home-tab3">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Contact Details</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Fullname</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Referred By
                                                        </label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Mobile Number</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <textarea type="text" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>State</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Pincode</label>
                                                        <input type="text" class="form-control">
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
                                                        <input type="date" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label>Age</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Marital Status</label>
                                                        <select name="" class="form-control">
                                                            <option value="">Single</option>
                                                            <option value="">Married</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Purpose of visit</label>
                                                        <select name="" class="form-control">
                                                            <option value=""> i want to lose weight</option>
                                                            <option value=""> i want to gain weight</option>
                                                            <option value=""> i want eat well-balanced meals to
                                                                stay healthy and boost my immunity</option>
                                                            <option value="" selected>Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Purpose of Visit Other</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Purpose of Visit">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>


                                <!-- Medical History Tab -->
                                <div class="tab-pane fade" id="medicalhistory" role="tabpanel"
                                    aria-labelledby="profile-tab3">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Medical History <p>Mark (✓) any of these you may suffer from so we can
                                                    work out a holistic wellness plan for you</p>
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                @for ($i = 0; $i < count($data); $i++) <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label> {{ $data[$i][0]->type }} </label>
                                                        <select class="form-control select2" multiple="">
                                                            @foreach ($data[$i] as $singleData)
                                                            <option> {{ $singleData['name'] }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                            </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Other Medical Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Do you have any other medical problems that are not
                                                        covered above? Please give us the details.</label>
                                                    <textarea class="form-control"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Do you have any food allergies? If you do, please name
                                                        the foods and the reactions they cause in your body.</label>
                                                    <textarea class="form-control"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Have you ever been hospitalised? If yes, please write
                                                        down when and for what reason.</label>
                                                    <textarea class="form-control"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Have you undergone surgery in the past? If you have,
                                                        please mention when and for what.</label>
                                                    <textarea class="form-control"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Certain health problems such as diabetes, high blood
                                                        pressure, cancer,
                                                        heart ailments, thyroid, asthma, high cholesterol,
                                                        rheumatoid arthritis,
                                                        thalassemia minor run in our families. Please take a moment
                                                        to think about whether
                                                        any of these are present in yours. This will help us analyse
                                                        your case more accurately.</label>
                                                    <textarea class="form-control"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>How often do you suffer from cold, cough or flu?</label>
                                                    <textarea class="form-control"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>What’s the name of your family
                                                        doctor/GP/īendocrinologist?</label>
                                                    <textarea class="form-control"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr>
                                </hr>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Are you a female? Tell us about your obstetric history.</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>do you have children? if you do, please mention the
                                                        year(s) of delivery.</label>
                                                    <textarea class="form-control"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label>are you a breastfeeding mother? if yes, please mention
                                                        how many months you have been nursing your child
                                                        for.</label>
                                                    <textarea class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>have you menopaused?</label>
                                                    <br>
                                                    <input type="checkbox">Yes
                                                    <input type="checkbox">No
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>if you haven’t menopaused, do you have regular
                                                        periods?</label>
                                                    <br>
                                                    <input type="checkbox">Yes
                                                    <input type="checkbox">No
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>please tell us the name of your gynaecologist.</label>
                                                    <textarea class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>


                            <!-- Payment -->
                            <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="contact-tab3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Package Type</label>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Flat Fee</option>
                                                        <option value="">Package</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Select Package</label>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Diet Program</option>
                                                        <option value="">Weight Program</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Select Duration</label>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">1 Week</option>
                                                        <option value="">1 Month</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Select Currency</label>
                                                    <select name="" id="" class="form-control">
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
                                                    <input type="text" placeholder="Enter Amount" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Discount %</label>
                                                    <input type="text" placeholder="Enter Discount %"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Tax %</label>
                                                    <input type="text" placeholder="Enter Tax %" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Final Amount</label>
                                                    <input type="text" placeholder="Amount - (Discount %) + (Tax %)"
                                                        class="form-control">
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
                                                    <label for="">Start Date</label>
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
                                                    <input type="text" name="" id=""
                                                        placeholder="Enter Transaction Number" class="form-control">
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
                                                    <input type="text" name="" class="form-control"
                                                        placeholder="No. of Installment" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Initial Payment</label>
                                                    <input type="text" name="" class="form-control"
                                                        placeholder="Enter Initial Amount" id="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <i class="fa fa-trash"></i>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="">Installment Amount</label>
                                                            <input type="d" name="" class="form-control"
                                                                placeholder="Enter Amount" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="">Installment Date</label>
                                                            <input type="date" name="" class="form-control"
                                                                placeholder="Installment Date" id="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <i class="fa fa-trash"></i>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="">Installment Amount</label>
                                                            <input type="d" name="" class="form-control"
                                                                placeholder="Enter Amount" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="">Installment Date</label>
                                                            <input type="date" name="" class="form-control"
                                                                placeholder="Installment Date" id="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <i class="fa fa-trash"></i>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="">Installment Amount</label>
                                                            <input type="d" name="" class="form-control"
                                                                placeholder="Enter Amount" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="">Installment Date</label>
                                                            <input type="date" name="" class="form-control"
                                                                placeholder="Installment Date" id="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>


                            <!-- Diet -->





                            <!-- Remarks -->



                            <!-- Follow Up -->
                            <div class="tab-pane fade" id="followup" role="tabpanel" aria-labelledby="contact-tab3">


                                <div class="row">
                                    <div class="col-12 col-sm-6 col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                            href="#Anthropometric" role="tab" aria-controls="home"
                                                            aria-selected="true">Anthropometric</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="profile-tab" data-toggle="tab"
                                                            href="#Exercise" role="tab" aria-controls="profile"
                                                            aria-selected="false">Exercise</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="contact-tab" data-toggle="tab"
                                                            href="#DietFollowed" role="tab" aria-controls="contact"
                                                            aria-selected="false">Diet Followed</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="contact-tab" data-toggle="tab"
                                                            href="#LabData" role="tab" aria-controls="contact"
                                                            aria-selected="false">Lab Data</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="contact-tab" data-toggle="tab"
                                                            href="#Medication" role="tab" aria-controls="contact"
                                                            aria-selected="false">Medication</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="Anthropometric"
                                                        role="tabpanel" aria-labelledby="home-tab">
                                                        <div class="col-md-12 mt-5">
                                                            <button class="btn btn-primary"
                                                                onclick="show_anthro_modal()">Add New Anthropometric
                                                                Data</button>
                                                        </div>
                                                        <div class="card followUpAnthroCard border mt-5 p-0">
                                                            <div class="card-body">
                                                                <div class="row flex-row flex-nowrap">
                                                                    <div class="col-md-2 followUpAnthro">
                                                                        <ul>
                                                                            <li class="bg-primary">Date</li>
                                                                            <li>Weight (Cms)</li>
                                                                            <li>Height (Cms)</li>
                                                                            <li>BCF %</li>
                                                                            <li>Wist (Inchs)</li>
                                                                            <li>Chest (Inches)</li>
                                                                            <li>Waist (Inches)</li>
                                                                            <li>Hips (Inches)</li>
                                                                            <li>Mid arms</li>
                                                                            <li>Upper Thighs</li>
                                                                            <li>Metobolic age (yrs)</li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-md-2 followUpAnthro">
                                                                        <ul>
                                                                            <li class="bg-primary">26-12-2022</li>
                                                                            <li>56</li>
                                                                            <li>240</li>
                                                                            <li>3</li>
                                                                            <li>15</li>
                                                                            <li>35</li>
                                                                            <li>35</li>
                                                                            <li>35</li>
                                                                            <li>26</li>
                                                                            <li>32</li>
                                                                            <li>45</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="Exercise" role="tabpanel"
                                                        aria-labelledby="profile-tab">

                                                        <div class="col-md-12 mt-5">
                                                            <button class="btn btn-primary"
                                                                onclick="show_exercise_modal()">Add New Excercise
                                                                Data</button>
                                                        </div>
                                                        <div class="card followUpAnthroCard border mt-5 p-0">
                                                            <div class="card-body">
                                                                <div class="row">

                                                                    <table class="table table-bordered table-sm">
                                                                        <h5>Date : 12 Dec 2022</h5>
                                                                        <thead class="bg-primary">
                                                                            <th>Exercise</th>
                                                                            <th>Units</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Yoga</td>
                                                                                <td>12 Min</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Walking</td>
                                                                                <td>12 Min</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Treadmil</td>
                                                                                <td>12 Min</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Air Cycling</td>
                                                                                <td>12 Min</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>


                                                                    <table class="table table-bordered table-sm">
                                                                        <h5>Date: 14 Dec 2022</h5>
                                                                        <thead class="bg-primary">
                                                                            <th>Exercise</th>
                                                                            <th>Units</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Yoga</td>
                                                                                <td>12 Min</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Walking</td>
                                                                                <td>20 Min</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Treadmil</td>
                                                                                <td>5 Min</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Air Cycling</td>
                                                                                <td>5 Min</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="tab-pane fade" id="DietFollowed" role="tabpanel"
                                                        aria-labelledby="contact-tab">

                                                        <h3>Diet history</h3>

                                                    </div>

                                                    <div class="tab-pane fade" id="LabData" role="tabpanel"
                                                        aria-labelledby="contact-tab">
                                                        <h3>Lab Data same as Excersie</h3>
                                                    </div>

                                                    <div class="tab-pane fade" id="Medication" role="tabpanel"
                                                        aria-labelledby="contact-tab">
                                                        <h3>Medicines Same as Excercise</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Documents -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>

<!-- Add Anthro Modal  -->
<div class="modal anthro" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                    <hr>

                    <div class="col-md-12">
                        <label for="">Date</label>
                        <input type="date" name="" id="" class="form-control" placeholder="Enter Value">
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <label for="">Weight (Cms)</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Enter Value">
                        </div>
                        <div class="row">
                            <label for="">Height (cms)</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Enter Value">
                        </div>
                        <div class="row">
                            <label for="">BCF %</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Enter Value">
                        </div>
                        <div class="row">
                            <label for=""> Wist (Inchs)</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Enter Value">
                        </div>
                        <div class="row">
                            <label for=""> Chest (Inches)</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Enter Value">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="row">
                            <label for=""> Waist (Inches)</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Enter Value">
                        </div>
                        <div class="row">
                            <label for=""> Hips (Inches)</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Enter Value">
                        </div>
                        <div class="row">
                            <label for=""> Mid arms</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Enter Value">
                        </div>
                        <div class="row">
                            <label for=""> Upper Thighs</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Enter Value">
                        </div>
                        <div class="row">
                            <label for=""> Metobolic age (yrs)</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Enter Value">
                        </div>

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


<!-- Add Exsercise Modal  -->
<div class="modal exercise" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Enter Client Name</label>
                        <input type="text" name="" id="" class="form-control" placeholder="Enter Client Name">
                    </div>
                    <div class="col-md-6">
                        <label for="">Select Appointment Date</label>
                        <input type="text" class="form-control datepicker">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Select Appointment Start Time</label>
                        <input type="text" class="form-control timepicker">
                    </div>
                    <div class="col-md-6">
                        <label for="">Select Appointment End Time</label>
                        <input type="text" class="form-control timepicker">
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

@include('dev.include.footer')

<!-- JS Libraies -->
<script src="{{ asset('assets/modules/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ asset('assets/modules/codemirror/mode/javascript/javascript.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/features-setting-detail.js') }}"></script>

<script>
function show_anthro_modal() {
    $('.anthro').modal('show');
}

function show_exercise_modal() {
    $('.exercise').modal('show');
}
</script>