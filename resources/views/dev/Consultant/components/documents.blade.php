<div class="card">
    <div class="card-header">
        <button class="btn btn-primary" onclick="show_document_modal()">Add New Document</button>
    </div>
    <div class="card-body">

        <div class="row">
            <table class="table table-bordered table-sm">
                <thead class="bg-primary">
                    <th>Date</th>
                    <th>Document Name</th>
                    <th>Document</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if (count($user_data) > 0)
                        @foreach ($user_data as $single_data)
                            <tr>
                                <td>{{ $single_data['document_date'] }}</td>
                                <td>{{ $single_data['document_name'] }}</td>
                                <td><a
                                        href="{{ url('/downloadFile/' . urlencode($single_data['document_url']) . '/' . str_replace(' ', '_', $single_data['document_name'])) }}">{{ $single_data['document_url'] }}</a>
                                </td>
                                <td><a class="btn btn-primary text-white"
                                        onclick="show_remark_modal('{{ $single_data['id'] }}','delete')">Delete</a></td>
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
