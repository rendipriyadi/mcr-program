<table class="table table-vcenter card-table">
    <thead>
      <tr>
      
        <th>modelhauler</th>
        <th>factor_truck</th>
        <th>sitecode</th>
      
        <th class="w-1"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($factor as $factor)
            
      
      <tr>
       
        <td>{{ $factor->modelhauler}}</td>
        <td>{{ $factor->factor_truck}}</td>
        <td>{{ $factor->sitecode}}</td>
    </tr>
         
    @endforeach
  </tbody>
</table>