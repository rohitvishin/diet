<div class="card followUpAnthroCard">
    <div class="card-header">
        <button class="btn btn-primary" onclick="show_diet_chart_modal('','add')">Add New Diet Plan</button>
    </div>
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