<table>
    <thead>
        <tr>
            <th>sitecode</th>
            <th>fueldate</th>
            <th>shiftcode</th>
            <th>typecode</th>
            <th>fuelmodel</th>
            <th>fuelcnunit</th>
            <th>hmbefore</th>
            <th>hmstart</th>
            <th>fueltotal</th>
            <th>fuelusage</th>
            <th>fuelcons</th>
            <th>fuelob</th>
            <th>fuelcoal</th>
            <th>fuelcoaltransport</th>
            <th>dedicated</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($fuel as $fuel)
            <tr>

                <td>{{ $fuel->sitecode}}</td>
                <td>{{ $fuel->fueldate }}</td>
                <td>{{ $fuel->shiftcode }}</td>
                <td>{{ $fuel->typecode }}</td>
                <td>{{ $fuel->fuelmodel }}</td>
                <td>{{ $fuel->fuelcnunit}}</td>
                <td>{{ $fuel->hmbefore}}</td>
                <td>{{ $fuel->hmstart}}</td>
                <td>{{ $fuel->fueltotal}}</td>
                <td>{{ $fuel->fuelusage}}</td>
                <td>{{ $fuel->fuelcons}}</td>
                <td>{{ $fuel->fuelob}}</td>
                <td>{{ $fuel->fuelcoal }}</td>
                <td>{{ $fuel->fuelcoaltransport }}</td>
                <td>{{ $fuel->dedicated}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
