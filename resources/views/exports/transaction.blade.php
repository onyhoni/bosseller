<table>
    <thead>
        <tr>
            <th>Invoice</th>
            <th>Type</th>
            <th>ID</th>
            <th>Platfrom</th>
            <th>Name</th>
            <th>Color</th>
            <th>Size</th>
            <th>Qty</th>
            <th>Date Send</th>
            <th>Consignee</th>
            <th>Airwaybill</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->invoice }}</td>
                <td>{{ $transaction->type }}</td>
                <td>{{ $transaction->package->account }}</td>
                <td>{{ $transaction->platform }}</td>
                <td>{{ $transaction->package->name }}</td>
                <td>{{ $transaction->package->color }}</td>
                <td>{{ $transaction->package->size }}</td>
                <td>{{ $transaction->qty }}</td>
                <td>{{ $transaction->send }}</td>
                <td>{{ $transaction->consignee }}</td>
                <td>{{ $transaction->airwaybill }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
