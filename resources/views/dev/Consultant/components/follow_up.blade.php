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
                                    <li class="bg-primary text-white">{{ $single_data['anthro_date'] }} </li>
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
                                    <li class="p-2">
                                        <button class="btn btn-danger"
                                            onclick="deleteData(this,'{{ $single_data['id'] }}','{{ $single_data['client_id'] }}','anthro')">Delete</button>
                                        <button class="btn btn-primary"
                                            onclick="show_anthro_modal('{{ json_encode($single_data) }}', 'edit')">Edit</button>
                                    </li>
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
                                        <td>
                                            <button class="btn btn-danger"
                                                onclick="deleteData(this,'{{ $single_data['id'] }}','{{ $single_data['client_id'] }}','exercise')">Delete</button>
                                            <button type="button" class="btn btn-sm btn-primary"
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
                    <button class="btn btn-primary" onclick="show_diet_followed_modal('', 'add')">Add New Diet Followed
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
                            @if(count($user_data) > 0 && $suburl == 'diet_followed')
                            @foreach($user_data as $single_data)
                            <div class="col-md-2 followUpAnthro">

                                <ul>
                                    <li class="bg-primary text-white">{{ $single_data['diet_followed_date'] }}
                                    </li>
                                    <li>{{ $single_data['vitamins'] }}</li>
                                    <li>{{ $single_data['general_health'] }}</li>
                                    <li>{{ $single_data['reports'] }}</li>
                                    <li>{{ $single_data['met_dr'] }}</li>
                                    <li>{{ $single_data['food_plan'] }}</li>
                                    <li>{{ $single_data['diet_advised'] }}</li>
                                    <li>{{ $single_data['meal_timing'] }}</li>
                                    <li>{{ $single_data['portion_control'] }}</li>
                                    <li>{{ $single_data['carbs'] }}</li>
                                    <li>{{ $single_data['protiens'] }}</li>
                                    <li>{{ $single_data['fried'] }}</li>
                                    <li>{{ $single_data['desserts'] }}</li>
                                    <li>{{ $single_data['other_cheatings'] }}</li>
                                    <li>{{ $single_data['meal_out'] }}</li>
                                    <li>{{ $single_data['alchol'] }}</li>
                                    <li>{{ $single_data['travel'] }}</li>
                                    <li>{{ $single_data['diet_plan_percentage'] }}</li>
                                    <li>{{ $single_data['remarks'] }}</li>
                                    <li class="text-center p-2">
                                        <button type="button" class="btn btn-primary"
                                            onclick="show_diet_followed_modal('{{ json_encode($single_data) }}','edit')">Edit</button>
                                        <button class="btn btn-danger"
                                            onclick="deleteData(this,'{{ $single_data['id'] }}','{{ $single_data['client_id'] }}','diet_followed')">Delete</button>
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                            @endif


                        </div>
                    </div>
                </div>

            </div>

            <!-- Lab Data -->
            <div class="tab-pane fade {{ $suburl == 'lab_data' ? 'show active' : '' }}" id="LabData" role="tabpanel"
                aria-labelledby="contact-tab">
                <div class="col-md-12 mt-5">
                    <button class="btn btn-primary" onclick="show_lab_modal('','add')">Add New Lab
                        Data</button>
                </div>
                <div class="card followUpAnthroCard border mt-5 p-0">
                    <div class="card-body">
                        <div class="row">

                            <table class="table table-bordered table-sm">
                                <thead class="bg-primary">
                                    <th>Lab Test Date</th>
                                    <th>Lab Test Name</th>
                                    <th>Result</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @if(count($user_data) > 0 && $suburl == 'lab_data')
                                    @foreach($user_data as $single_data)
                                    <tr>
                                        <td> {{ $single_data['lab_test_date'] }} </td>
                                        <td> {{ $single_data['test_name'] }} </td>
                                        <td class="text-white bg-{{ $single_data['test_color'] ?? 'danger' }}">
                                            {{ $single_data['test_result'] }} </td>
                                        <td>
                                            <button class="btn btn-danger"
                                                onclick="deleteData(this,'{{ $single_data['id'] }}','{{ $single_data['client_id'] }}','lab')">Delete</button>
                                            <button type="button" class="btn btn-sm btn-primary"
                                                onclick="show_lab_modal('{{ json_encode($single_data) }}','edit')">Edit</button>
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

            <!-- Medications  -->
            <div class="tab-pane fade {{ $suburl == 'medication' ? 'show active' : '' }}" id="Medication"
                role="tabpanel" aria-labelledby="contact-tab">

                <div class="col-md-12 mt-5">
                    <button class="btn btn-primary" onclick="show_medicine_modal('','add')">Add New Medicine
                        Data</button>
                </div>
                <div class="card followUpAnthroCard border mt-5 p-0">
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-bordered table-sm">
                                <thead class="bg-primary">
                                    <th>Name of medication</th>
                                    <th>Time To Take</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @if(count($user_data) > 0 && $suburl == 'medication')
                                    @foreach($user_data as $single_data)
                                    <tr>
                                        <td>{{ $single_data['medicine_name'] }}</td>
                                        <td>{{ $single_data['time_to_take'] }}</td>
                                        <td>
                                            <button class="btn btn-danger"
                                                onclick="deleteData(this,'{{ $single_data['id'] }}','{{ $single_data['client_id'] }}','medicine')">Delete</button>
                                            <button type="button" class="btn btn-sm btn-primary"
                                                onclick="show_medicine_modal('{{ json_encode($single_data) }}','edit')">Edit</button>
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
        </div>
    </div>
</div>