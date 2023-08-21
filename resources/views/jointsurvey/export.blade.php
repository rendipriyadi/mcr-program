<table>
    <thead>
        <tr>
            <th>sitecode</th>
            <th>jointmonth</th>
            <th>material</th>
           <th>jointtotal</th>
          
        </tr>
    </thead>
    <tbody>
        @foreach ($jointsurvey as $jointsurvey)
            <tr>
                 
            <td>{{ $jointsurvey->sitecode}}</td>
            <td>{{ $jointsurvey->jointmonth}}</td>
            <td>{{ $jointsurvey->material }}</td>
            <td>{{ $jointsurvey->jointtotal}}</td>
            </tr>
        @endforeach
    </tbody>
</table>