<table class="table table-vcenter card-table">
    <thead>
      <tr>
        <th>material</th>
        <th>submaterial </th>
        <th>factor</th>
        <th>sitecode</th>
        
      
        <th class="w-1"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($material as $material)
            
      
      <tr>
        <td>{{ $material->material}}</td>
        <td>{{ $material->submaterial}}</td>
        <td>{{ $material->factor}}</td>
        <td>{{ $material->sitecode}}</td>
        
       
      </tr>
     
      @endforeach
    </tbody>
  </table>