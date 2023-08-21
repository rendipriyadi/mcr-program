<table class="table table-vcenter card-table">
    <thead>
      <tr>
        
        <th>prodproblem</th>
        <th>sitecode</th>
      
        <th class="w-1"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($problem as $problem)
            
      
      <tr>
        
        <td>{{ $problem->prodproblem}}</td>
        <td>{{ $problem->sitecode}}</td>
        
      </tr>
     
      @endforeach
    </tbody>
  </table>