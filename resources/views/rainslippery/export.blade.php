<table>
    <thead>
        <tr>
            <th>sitecode</th>
            <th>rainslipdate</th>
            <th>rainslipshift</th>
            <th>rainstart</th>
            <th>rainend</th>
            <th>rainhour </th>
            <th>slipperystart</th>
            <th>slipperyend</th>
            <th>slipperyhour</th>
            <th>rainfall</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($rainslippery as $rainslippery)
            <tr>
                <td>{{ $rainslippery->sitecode}}</td>
                <td>{{ $rainslippery->rainslipdate}}</td>
                <td>{{ $rainslippery->rainslipshift}}</td>
                <td>{{ $rainslippery->rainstart }}</td>
                <td>{{ $rainslippery->rainend}}</td>
                <td>{{ $rainslippery->rainhour}}</td>
                <td>{{ $rainslippery->slipperystart}}</td>
                <td>{{ $rainslippery->slipperyend }}</td>
                <td>{{ $rainslippery->slipperyhour}}</td>
                <td>{{ $rainslippery->rainfall}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
