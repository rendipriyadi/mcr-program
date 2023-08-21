<table class="table table-vcenter card-table">
    <thead>
      <tr>
        <th>categori</th>
        <th>time</th>
        <th>jam</th>
        <th>shift</th>
        <th>calculation</th>
        <th>number</th>
        <th class="w-1"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($time as $time)
            
      
      <tr>
        <td>{{ $time->categori }}</td>
        <td>{{ $time->time }}</td>
        <td>{{ $time->jam }}</td>
        <td>{{ $time->shift }}</td>
        <td>{{ $time->calculation}}</td>
        <td>{{ $time->number }}</td>  
      </tr>
        @endforeach
    </tbody>
</table>