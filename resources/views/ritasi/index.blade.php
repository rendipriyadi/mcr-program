@extends('templating.default')



@php
    $title ="Data Ritasi";
    $preTitle ="";
@endphp



@section('isi')


<div class="panel panel-inverse">


    <div class="panel-body">

        <div class="d-flex">
            <div class="ms-2 d-inline-block">
        <a href="{{ route('ritasi.create') }}" class="btn btn-primary">Create New Ritasi </a>
      <a type="button" class="btn btn-success" data-bs-toggle="modal" href="#import">
      Upload
      </a>
      <a href="{{ route('ritasi.export') }}" class="btn btn-purple"> Export </a>
            </div>
        </div>
    </div>

        <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
          <tr>
            <th>Site</th>
            <th width="1%">Date</th>
            <th width="1%">Shift</th>
            <th width="1%">Time</th>
            <th class="text-nowrap">NIK Loader</th>
            <th class="text-nowrap">Op.Loader</th>
            <th class="text-nowrap">NIK Hauler</th>
            <th class="text-nowrap">Op.Hauler</th>
            <th class="text-nowrap">Loader</th>
            <th class="text-nowrap">Model Loader</th>
            <th class="text-nowrap">Hauler</th>
            <th class="text-nowrap">Model Hauler</th>
            <th class="text-nowrap">Block</th>
            <th class="text-nowrap">PIT</th>
            <th class="text-nowrap">Distance</th>
            <th class="text-nowrap">Ritase</th>
            <th class="text-nowrap">Material</th>
            <th class="text-nowrap">Sub Material</th>
            <th class="text-nowrap">Prod</th>
            <th class="text-nowrap">Prod Adjust</th>
            <th class="text-nowrap">Dist*Vol</th>
            <th class="text-nowrap">Factor</th>
            <th class="text-nowrap">Detail</th>
            <th class="text-nowrap">Dumping</th>
            <th width="1%"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($ritase as $ritasi)


            <tr>
              <td>{{ $ritasi->sitecode}}</td>
              <td>{{ $ritasi->date}}</td>
              <td>{{ $ritasi->shift}}</td>
              <td>{{ $ritasi->time }}</td>
              <td>{{ $ritasi->nikloader}}</td>
              <td>{{ $ritasi->oploader}}</td>
              <td>{{ $ritasi->nikhauler}}</td>
              <td>{{ $ritasi->ophauler}}</td>
              <td>{{ $ritasi->codeloader}}</td>
              <td>{{ $ritasi->modelloader}}</td>
              <td>{{ $ritasi->codehauler }}</td>
              <td>{{ $ritasi->modelhauler}}</td>
              <td>{{ $ritasi->block}}</td>
              <td>{{ $ritasi->pit}}</td>
              <td>{{ $ritasi->distance}}</td>
              <td>{{ $ritasi->ritase}}</td>
              <td>{{ $ritasi->material}}</td>
              <td>{{ $ritasi->submaterial}}</td>
              <td>{{ $ritasi->produksi }}</td>
              <td>{{ $ritasi->adjustment}}</td>
              <td>{{ $ritasi->distvol}}</td>
              <td>{{ $ritasi->factor}}</td>
              <td>{{ $ritasi->detail}}</td>
              <td>{{ $ritasi->dumping}}</td>



              <td>
                <a href="{{ route('ritasi.edit', $ritasi->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
              <br></br>
                <form action="{{ route('ritasi.destroy', $ritasi->id) }}" method="post">
                @csrf
                @method('DELETE')

                <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

                </form>
              </td>
            </tr>

            @endforeach

        </tbody>
    </table>

      {{--  {{ $ritase->links() }}  --}}
    </div>
    </div>
</div>
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">IMPORT DATA</h5>

          </div>
          <form action="{{ route('ritasi.import') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                  <div class="form-group">
                      <label>PILIH FILE</label>
                      <input type="file" name="file" class="form-control" required>
                  </div>
              </div>
              <div class="modal-footer">

                  <button type="submit" class="btn btn-success">IMPORT</button>
              </div>
          </form>
      </div>

  </div>

@endsection
