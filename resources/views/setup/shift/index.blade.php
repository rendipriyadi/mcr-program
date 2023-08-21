@extends('templating.default')



@php
    $title ="Setup Data";
    $preTitle ="Shift Code";
@endphp

@push('page-action')

@endpush

@section('isi')
<div class="panel panel-inverse">

    <div class="panel-body">
      <div class="d-flex">
        <div class="ms-2 d-inline-block">

            <a href="{{ route('shift.create') }}" class="btn btn-success">Create Shift</a>
            {{--  <a type="button" class="btn btn-info" data-bs-toggle="modal" href="#import">
            Upload
            </a>
            <a href="{{ route('shift.export') }}" class="btn btn-purple ">Export </a>  --}}
        </div>
      </div>
    </div>
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
          <tr>
            <th>Shift Code</th>
            <th>Shift</th>
            <th>Start Shift</th>
            <th>End Shift</th>

            <th width="1%"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($shifts as $shift)


          <tr>
            <td>{{ $shift->shift}}</td>
            <td>{{ $shift->shiftcode}}</td>
            <td>{{ $shift->startshift}}</td>
            <td>{{ $shift->endshift}}</td>
            <td>
              <a href="{{ route('shift.edit', $shift->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
            <br></br>
              <form action="{{ route('shift.destroy', $shift->id) }}" method="post">
              @csrf
              @method('DELETE')

              <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

              </form>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
      {{ $shifts->links() }}
    </div>
</div>
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">IMPORT DATA</h5>

          </div>
          <form action="{{ route('shift.import') }}" method="POST" enctype="multipart/form-data">
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
