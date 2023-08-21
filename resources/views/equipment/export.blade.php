<table>
    <thead>
        <tr>
            <th>category</th>
            <th>type </th>
            <th>modelunit</th>
            <th>codeunit</th>

            <th>truck_factor</th>
            <th>fungsi_equip</th>
            <th>status</th>
            <th>sitecode</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($equip as $equip)
            <tr>
                <td>{{ $equip->category }}</td>
                <td>{{ $equip->type }}</td>
                <td>{{ $equip->modelunit }}</td>
                <td>{{ $equip->codeunit }}</td>

                <td>{{ $equip->truck_factor }}</td>
                <td>{{ $equip->fungsi_equip }}</td>
                <td>{{ $equip->status }}</td>
                <td>{{ $equip->sitecode }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
