@extends('templating.default')



@php
    $title ="Data Location";
    $preTitle ="";
@endphp



@section('isi')
<div class="panel panel-inverse">

  <div class="panel-body">
    <div class="d-flex">
      <div class="ms-2 d-inline-block">
        <a href="{{ route('location.create') }}" class="btn btn-primary">Create Site Location</a>
        {{--  <a type="button" class="btn btn-success" data-bs-toggle="modal" href="#import">
          Import
        </a>
      <a href="location.export" class="btn btn-purple ">Export</a>  --}}
      </div>
    </div>
  </div>
  <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
          <tr>
            <th>Block</th>
            <th>PIT</th>


            <th>Site</th>
            <th width="1%"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($location as $location)


          <tr>
            <td>{{ $location->block }}</td>
            <td>{{ $location->pit}}</td>


            <td>{{ $location->sitecode }}</td>
            <td>
              <a href="{{ route('location.edit', $location->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
            <br></br>
              <form action="{{ route('location.destroy', $location->id) }}" method="post">
              @csrf
              @method('DELETE')

              <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

              </form>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
    </div>
</div>
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">IMPORT DATA</h5>

          </div>
          <form action="{{ route('location.import') }}" method="POST" enctype="multipart/form-data">
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
</div>
@endsection
