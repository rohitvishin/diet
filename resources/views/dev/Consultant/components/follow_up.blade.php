<div class="card">
    <div class="card-body">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link {{ $suburl == 'anthropometric' ? 'active' : '' }}" id="home-tab"
                    href="anthropometric">Anthropometric</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $suburl == 'exercise' ? 'active' : '' }}" id="profile-tab"
                    href="exercise">Exercise</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $suburl == 'diet_followed' ? 'active' : '' }}" id="contact-tab"
                    href="diet_followed">Diet Followed</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $suburl == 'lab_data' ? 'active' : '' }}" id="contact-tab" href="lab_data">Lab
                    Data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $suburl == 'medication' ? 'active' : '' }}" id="contact-tab"
                    href="medication">Medication</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade {{ $suburl == 'anthropometric' ? 'show active' : '' }}" id="Anthropometric"
                role="tabpanel" aria-labelledby="home-tab">
                <div class="col-md-12 mt-5">
                    <button class="btn btn-primary" onclick="show_anthro_modal('','add')">Add New Anthropometric
                        Data</button>
                </div>
                <div class="card followUpAnthroCard border mt-5 p-0">
                    <div class="card-body">
                        <div class="row flex-row flex-nowrap">
                            <div class="col-md-2 followUpAnthro">
                                <ul>
                                    <li class="bg-primary text-white">Date</li>
                                    <li>Weight (Kg)</li>
                                    <li>Fat %</li>
                                    <li>Total Body Water (Kg)</li>
                                    <li>Muscle Mass (Kg)</li>
                                    <li>Chest (Inches)</li>
                                    <li>Upper Waist (Inches)</li>
                                    <li>Hips (Inches)</li>
                                    <li>Lower Waist (Inches)</li>
                                    <li>BMR</li>
                                    <li>Height (Cm)</li>
                                    <li>Height</li>
                                </ul>
                            </div>
                            @if(count($user_data) > 0 && $suburl == 'anthropometric')
                            @foreach($user_data as $single_data)
                            <div class="col-md-2 followUpAnthro">


                                <ul>
                                    <li class="bg-primary text-white">{{ $single_data['anthro_date'] }} <a
                                            class="btn btn-sm btn-default hover-text-black float-right"
                                            onclick="show_anthro_modal('{{ json_encode($single_data) }}', 'edit')"><i
                                                class="fas fa-pencil-alt"></i></a>
                                    </li>
                                    <li>{{ $single_data['weight'] }}</li>
                                    <li>{{ $single_data['fat'] }}</li>
                                    <li>{{ $single_data['body_water'] }}</li>
                                    <li>{{ $single_data['muscle_mass'] }}</li>
                                    <li>{{ $single_data['chest'] }}</li>
                                    <li>{{ $single_data['upper_waist'] }}</li>
                                    <li>{{ $single_data['hips'] }}</li>
                                    <li>{{ $single_data['lower_waist'] }}</li>
                                    <li>{{ $single_data['bmr'] }}</li>
                                    <li>{{ $single_data['height_cm'] }}</li>
                                    <li>{{ $single_data['height'] }}</li>
                                </ul>

                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Exercise -->
            <div class="tab-pane fade {{ $suburl == 'exercise' ? 'show active' : '' }}" id="Exercise" role="tabpanel"
                aria-labelledby="profile-tab">

                <div class="col-md-12 mt-5">
                    <button class="btn btn-primary" onclick="show_exercise_modal('', 'add')">Add New Excercise
                        Data</button>
                </div>
                <div class="card followUpAnthroCard border mt-5 p-0">
                    <div class="card-body">
                        <div class="row">

                            <table class="table table-bordered table-sm">
                                <thead class="bg-primary text-white">
                                    <th>Exercise Date</th>
                                    <th>Exercise Name</th>
                                    <th>Exercise Unit</th>
                                    <th>Exercise Duration</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @if(count($user_data) > 0 && $suburl == 'exercise')
                                    @foreach($user_data as $single_data)
                                    <tr>
                                        <td>{{ $single_data['exercise_date'] }}</td>
                                        <td>{{ $single_data['exercise_name'] }}</td>
                                        <td>{{ $single_data['exercise_unit'] }}</td>
                                        <td>{{ $single_data['exercise_duration'] }}</td>
                                        <td><button type="button" class="btn btn-sm btn-primary"
                                                onclick="show_exercise_modal('{{ json_encode($single_data) }}','edit')">Edit</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5" class="text-center">No, Data Found</td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Diet Followed -->
            <div class="tab-pane fade {{ $suburl == 'diet_followed' ? 'show active' : '' }}" id="DietFollowed"
                role="tabpanel" aria-labelledby="contact-tab">

                <div class="col-md-12 mt-5">
                    <button class="btn btn-primary" onclick="show_diet_modal()">Add New Diet Followed
                        Data</button>
                </div>
                <div class="card followUpAnthroCard border mt-5 p-0">
                    <div class="card-body">
                        <div class="row flex-row flex-nowrap">
                            <div class="col-md-2 followUpAnthro">
                                <ul>
                                    <li class="bg-primary text-white">Date</li>
                                    <li>Vitamins</li>
                                    <li>General Health</li>
                                    <li>Reports</li>
                                    <li>Met Dr</li>
                                    <li>Food plan </li>
                                    <li>Diet advised</li>
                                    <li>Meal timings</li>
                                    <li>Portion control</li>
                                    <li>Carbs</li>
                                    <li>Protein</li>
                                    <li>Fried</li>
                                    <li>Desserts</li>
                                    <li>Other cheating</li>
                                    <li>Meal out</li>
                                    <li>Alcohol</li>
                                    <li>Travel</li>
                                    <li>Diet plan %</li>
                                    <li>Remarks</li>
                                </ul>
                            </div>
                            <div class="col-md-2 followUpAnthro">
                                <ul>
                                    <li class="bg-primary text-white">26-12-2022 <a
                                            class="btn btn-sm btn-default hover-text-black float-right"
                                            onclick="show_diet_modal()"><i class="fas fa-pencil-alt"></i></a>
                                    </li>
                                    <li>Taken</li>
                                    <li>All ok</li>
                                    <li>All fine</li>
                                    <li>yes, for fever</li>
                                    <li>taking as it is</li>
                                    <li>all food except oil</li>
                                    <li>4pm</li>
                                    <li>done</li>
                                    <li>500</li>
                                    <li>250</li>
                                    <li>2</li>
                                    <li>3</li>
                                    <li>smoking</li>
                                    <li>2</li>
                                    <li>1</li>
                                    <li>2</li>
                                    <li>45%</li>
                                    <li>In Progress</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Lab Data -->
            <div class="tab-pane fade {{ $suburl == 'lab_data' ? 'show active' : '' }}" id="LabData" role="tabpanel"
                aria-labelledby="contact-tab">
                <div class="col-md-12 mt-5">
                    <button class="btn btn-primary" onclick="show_exercise_modal()">Add New Lab
                        Data</button>
                </div>
                <div class="card followUpAnthroCard border mt-5 p-0">
                    <div class="card-body">
                        <div class="row">

                            <table class="table table-bordered table-sm">
                                <h5>Date : 12 Dec 2022</h5>
                                <thead class="bg-primary">
                                    <th>Lab Test Name</th>
                                    <th>Result</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Blood Report</td>
                                        <td>B+</td>
                                    </tr>
                                    <tr>
                                        <td>Stomach Infection Report</td>
                                        <td>all good</td>
                                    </tr>
                                </tbody>
                            </table>


                            <table class="table table-bordered table-sm">
                                <h5>Date: 14 Dec 2022</h5>
                                <thead class="bg-primary">
                                    <th>Lab Test Name</th>
                                    <th>Result</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Blood Report</td>
                                        <td>B-</td>
                                    </tr>
                                    <tr>
                                        <td>Stomach Infection Report</td>
                                        <td>all good</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Medications  -->
            <div class="tab-pane fade {{ $suburl == 'medication' ? 'show active' : '' }}" id="Medication"
                role="tabpanel" aria-labelledby="contact-tab">

                <div class="col-md-12 mt-5">
                    <button class="btn btn-primary" onclick="show_medicine_modal()">Add New Medicine
                        Data</button>
                </div>
                <div class="card followUpAnthroCard border mt-5 p-0">
                    <div class="card-body">
                        <div class="row">

                            <table class="table table-bordered table-sm">
                                <h5>Date : 12 Dec 2022</h5>
                                <thead class="bg-primary">
                                    <th>Name of medication</th>
                                    <th>Time taken at</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Combiflame</td>
                                        <td>Breakfast</td>
                                    </tr>
                                    <tr>
                                        <td>Medicine 2</td>
                                        <td>Lunch</td>
                                    </tr>
                                    <tr>
                                        <td>Medicine 3</td>
                                        <td>Dinner</td>
                                    </tr>
                                    <tr>
                                        <td>Combiflame</td>
                                        <td>Evening snacks</td>
                                    </tr>
                                </tbody>
                            </table>


                            <table class="table table-bordered table-sm">
                                <h5>Date : 14 Dec 2022</h5>
                                <thead class="bg-primary">
                                    <th>Name of medication</th>
                                    <th>Time taken at</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Combiflame</td>
                                        <td>Breakfast</td>
                                    </tr>
                                    <tr>
                                        <td>Medicine 2</td>
                                        <td>Lunch</td>
                                    </tr>
                                    <tr>
                                        <td>Medicine 3</td>
                                        <td>Dinner</td>
                                    </tr>
                                    <tr>
                                        <td>Combiflame</td>
                                        <td>Evening snacks</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>