<table>
    <thead>
        <tr>
            <th>sitecode</th>
            <th>breakdate</th>
            <th>breakshift</th>
            <th>breaktype</th>
            <th>breakmodel</th>
            <th>breakcnunit</th>
            <th>bdawal</th>
            <th>bdakhir</th>
            <th>breaktotal</th>
            <th>bdcategory</th>
           
            <th>breakstatus</th>
          
            <th>bddesc</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($breakdown as $breakdown)
                
          
        <tr>
          <td>{{ $breakdown->sitecode}}</td>
          <td>{{ $breakdown->breakdate }}</td>
          <td>{{ $breakdown->breakshift }}</td>
          <td>{{ $breakdown->breaktype}}</td>
          <td>{{ $breakdown->breakmodel}}</td>
          <td>{{ $breakdown->breakcnunit}}</td>
          <td>{{ $breakdown->bdawal}}</td>
          <td>{{ $breakdown->bdakhir}}</td>
          <td>{{ $breakdown->breaktotal}}</td>
          <td>{{ $breakdown->bdcategory}}</td>
          <td>{{ $breakdown->breakstatus}}</td>
          <td>{{ $breakdown->bddesc}}</td>
         
          
        </tr>
        @endforeach
    </tbody>
</table>