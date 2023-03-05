<div class="card">
    <div class="card-header">
        <button class="btn btn-primary" onclick="show_diet_chart_modal('','add')">Add New Diet Plan</button>
    </div>
    <div class="card-body">

        <div class="row">
            <table class="table table-bordered table-sm">
                <thead class="bg-primary">
                    <th>Date</th>
                    <th>Plan Name</th>
                    <th>Plan Intro</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if (count($user_data) > 0)
                    @foreach ($user_data as $single_data)
                    <tr>
                        <td>{{ $single_data['diet_chart_date'] }}</td>
                        <td>{{ $single_data['plan_name'] }}</td>
                        <td>{{ $single_data['plan_intro'] }}</td>
                        <td><a class="btn btn-danger text-white"
                                onclick="delete_diet_chart('{{ $single_data['id'] }}','{{ $single_data['client_id'] }}','delete')">Delete</a>
                            <a class="btn btn-primary text-white"
                                onclick="show_diet_chart_modal('{{ $single_data['id'] }}','{{ $single_data['diet_chart_date'] }}','{{ $single_data['plan_name'] }}','{{ $single_data['plan_intro'] }}',`{{ $single_data['diet_chart_template'] }}`,'update')">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <th>No Data Found..
                    </th>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</div>