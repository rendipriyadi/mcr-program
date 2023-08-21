@extends('templating.default')



@php
    $title ="Setup Data";
    $preTitle ="Time Category";
@endphp

@push('page-action')

@endpush

@section('isi')
<div class="panel panel-inverse">

    <div class="panel-body">
      <div class="d-flex">
        <div class="ms-2 d-inline-block">

            <a href="{{ route('time.create') }}" class="btn btn-primary">Create Time Category</a>
            {{--  <a type="button" class="btn btn-success" data-bs-toggle="modal" href="#import">
            Upload
            </a>
            <a href="{{ route('time.export') }}" class="btn btn-purple ">Export </a>  --}}
        </div>
      </div>
    </div>
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
          <tr>
            <th>Category</th>
            <th>Time</th>
            <th>Jam</th>
            <th>Shift</th>
            <th>Calculation</th>
            <th>Number</th>
            <th width="1%"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($times as $time)


          <tr>
            <td>{{ $time->categori }}</td>
            <td>{{ $time->time }}</td>
            <td>{{ $time->jam }}</td>
            <td>{{ $time->shift }}</td>
            <td>{{ $time->calculation}}</td>
            <td>{{ $time->number }}</td>
            <td>
              <a href="{{ route('time.edit', $time->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
            <br></br>
              <form action="{{ route('time.destroy', $time->id) }}" method="post">
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
          <form action="{{ route('time.import') }}" method="POST" enctype="multipart/form-data">
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
