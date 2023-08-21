<table>
    <thead>
        <tr>
            <th>sitecode</th>
            <th>dateham</th>
            <th>datehm</th>
            <th>nikopthm</th>
            <th>opthm</th>
            <th>modelhm</th>
            <th>cnunithm</th>
            <th>hmawal</th>
            <th>hmakhir</th>
            <th>totalhm</th>
            <th>remarkhm</th>
          
        </tr>
    </thead>
    <tbody>
        @foreach ($hourmeter as $hourmeter)
            <tr>
                 
                <td>{{ $hourmeter->sitecode }}</td>
                <td>{{ $hourmeter->datehm}}</td>
                <td>{{ $hourmeter->shift}}</td>
                <td>{{ $hourmeter->nikopthm}}</td>
                <td>{{ $hourmeter->opthm }}</td>
                <td>{{ $hourmeter->modelhm}}
                <td>{{ $hourmeter->cnunithm}}</td>
                <td>{{ $hourmeter->hmawal}}</td>
                <td>{{ $hourmeter->hmakhir}}</td>
                <td>{{ $hourmeter->totalhm}}</td>
                <td>{{ $hourmeter->remarkhm }}</td>
            </tr>
        @endforeach
    </tbody>
</table>