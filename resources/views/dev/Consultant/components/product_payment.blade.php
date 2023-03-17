<div class="card">

    <div class="card-header">
        <button class="btn btn-primary" onclick="show_payment_modal('','add')">Add New Product Payment</button>
    </div>
    <div class="card-body">

        <div class="row">
            <table class="table table-bordered table-sm">
                <thead class="bg-primary text-white">
                    <th>Date</th>
                    <th>Products Name</th>
                    <th>Amount</th>
                    <th>qty</th>
                    <th>Final amount</th>
                    <th>Action</th>
                </thead>
                <tbody>

                    @if(count($user_data) > 0)
                    @foreach($user_data as $single_data)
                    <tr>
                        <td>{{ date('d M Y',strtotime($single_data['payment_date'])) }}</td>
                        <td>{{ $single_data['product_name'] }}</td>
                        <td>{{ $single_data['amount'] }}</td>
                        <td>{{ $single_data['qty'] }}</td>
                        <td>{{ $single_data['final_amt'] }}</td>
                        <td><a href="{{ url('/download_invoice/'.$single_data['id'].'/'.$single_data['client_id']) }}"
                                class="btn btn-primary text-white">Invoice</a>
                            <a href="{{ url('/view_invoice/'.$single_data['id'].'/'.$single_data['client_id']) }}"
                                class="btn btn-primary text-white">View</a>
                            <a class="btn btn-danger text-white"
                                onclick="show_remark_modal('{{ json_encode($single_data) }}','update')">Delete</a>
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