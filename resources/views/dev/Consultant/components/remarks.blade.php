<div class="card">

    <div class="card-header">
        <button class="btn btn-primary" onclick="show_remark_modal('','add')">Add New Remark</button>
    </div>
    <div class="card-body">

        <div class="row">
            <table class="table table-bordered table-sm">
                <thead class="bg-primary">
                    <th>Date</th>
                    <th>Remark</th>
                    <th>Action</th>
                </thead>
                <tbody>

                    @if(count($user_data) > 0)
                    @foreach($user_data as $single_data)
                    <tr>
                        <td>{{ $single_data['remark_date'] }}</td>
                        <td>{{ $single_data['remark'] }}</td>
                        <td><a class="btn btn-primary text-white"
                                onclick="show_remark_modal('{{ $single_data }}','update')">Edit</a></td>
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