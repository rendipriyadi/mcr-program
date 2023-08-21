<table>
    <thead>
        <tr>
            <th>sitecode</th>
            <th>statusunitdate</th>
            <th>statusnikopt</th>
            <th>statusopt</th>
            <th>statuscnunit</th>
            <th>statusmodel</th>
            <th>statusitemcat</th>
            <th>statuscategory</th>
            <th>statusstart</th>
            <th>statusend</th>
            <th>statushour</th>
            <th>statusshift</th>
            <th>statuscode</th>
            <th>dedicated</th>
            <th>statusremark</th>
          
        </tr>
    </thead>
    <tbody>
        @foreach ($statusunit as $statusunit)
            <tr>
                <td>{{ $statusunit->sitecode}}</td>
                <td>{{ $statusunit->statusunitdate}}</td>
                
                <td>{{ $statusunit->statusnikopt}}</td>
                <td>{{ $statusunit->statusopt}}</td>
                <td>{{ $statusunit->statuscnunit}}</td>
                <td>{{ $statusunit->statusmodel}}</td>
                <td>{{ $statusunit->statusitemcat}}</td>
                
                <td>{{ $statusunit->statuscategory}}</td>
                <td>{{ $statusunit->statusstart}}</td>
                <td>{{ $statusunit->statusend }}</td>
                <td>{{ $statusunit->statushour}}</td>
                <td>{{ $statusunit->statusshift}}</td>
                <td>{{ $statusunit->statuscode}}</td>
                <td>{{ $statusunit->dedicated}}</td>
                <td>{{ $statusunit->statusremark}}</td>
            </tr>
        @endforeach
    </tbody>
</table>