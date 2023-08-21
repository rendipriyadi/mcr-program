<table>
    <thead>
        <tr>
            <th>sitecode</th>
            <th>date</th>
            <th>shift</th>
            <th>time</th>
            <th>nikloader</th>
            <th>oploader</th>
            <th>nikhauler</th>
            <th>ophauler</th>
            <th>codeloader</th>
            <th>modelloader</th>
            <th>codehauler</th>
            <th>modelhauler</th>
            <th>block</th>
            <th>pit</th>
            <th>distance</th>
            <th>ritase</th>
            <th>material</th>
            <th>submaterial</th>
            <th>produksi</th>
            <th>adjustment</th>
            <th>distvol</th>
            <th>factor</th>
            <th>detail</th>
            <th>dumping</th>
          
        </tr>
    </thead>
    <tbody>
        @foreach ($ritasi as $ritasi)
            <tr>
            <td>{{ $ritasi->sitecode}}</td>
            <td>{{ $ritasi->date}}</td>
            <td>{{ $ritasi->shift}}</td>
            <td>{{ $ritasi->time }}</td>
            <td>{{ $ritasi->nikloader}}</td>
            <td>{{ $ritasi->oploader }}</td>
            <td>{{ $ritasi->nikhauler}}</td>
            <td>{{ $ritasi->ophauler }}</td>
            <td>{{ $ritasi->codeloader}}</td>
            <td>{{ $ritasi->modelloader }}</td>
            <td>{{ $ritasi->codehauler}}</td>
            <td>{{ $ritasi->modelhauler }}</td>
            <td>{{ $ritasi->block}}</td>
            <td>{{ $ritasi->pit }}</td>
            <td>{{ $ritasi->distance}}</td>
            <td>{{ $ritasi->ritase }}</td>
            <td>{{ $ritasi->material}}</td>
            <td>{{ $ritasi->submaterial }}</td>
            <td>{{ $ritasi->produksi }}</td>
            <td>{{ $ritasi->adjustment }}</td>
            <td>{{ $ritasi->distvol}}</td>
            <td>{{ $ritasi->factor }}</td>
            <td>{{ $ritasi->detail}}</td>
            <td>{{ $ritasi->dumping }}</td>
            </tr>
        @endforeach
    </tbody>
</table>