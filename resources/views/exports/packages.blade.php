<table>
    <thead>
        <tr>
            <th>Account</th>
            <th>Name</th>
            <th>Size</th>
            <th>Description</th>
            <th>Stock</th>
            <th>Color</th>
            <th>Created</th>
            <th>Picture</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($packages as $package)
            <tr>
                <td>{{ $package->account }}</td>
                <td>{{ $package->name }}</td>
                <td>{{ $package->size }}</td>
                <td>{{ $package->description }}</td>
                <td>{{ $package->stock }}</td>
                <td>{{ $package->color }}</td>
                <td>{{ $package->created_at->format('d M , Y H:s') }}</td>
                <td>{{ $package->picture }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
