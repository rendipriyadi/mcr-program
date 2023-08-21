@extends('templating.default')



@php
    $title =" Data Hourmeter";
    $preTitle ="";
@endphp

@push('page-action')


@endpush

@section('isi')
<div class="panel panel-inverse">

    <div class="panel-body">
      <div class="d-flex">
        <div class="ms-2 d-inline-block">
            <a href="{{ route('hourmeter.create') }}" class="btn btn-primary">Create Hourmeter</a>
            <a type="button" class="btn btn-success" data-bs-toggle="modal" href="#import">
              Upload
            </a>
            <a href="{{ route('hourmeter.export') }}" class="btn btn-purple ">Export</a>
        </div>
      </div>
    </div>
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
          <tr>
            <th>Site</th>
            <th>Date</th>
            <th>Shift</th>
            <th>NIK Operator</th>
            <th>Operator</th>
            <th>Model</th>
            <th>CN Unit</th>
            <th>HM Awal</th>
            <th>HM Akhir</th>
            <th>Total (Hours)</th>
            <th>Remark</th>

            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($hourmeters as $hourmeter)


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
            <td>
                <a href="{{ route('hourmeter.edit', $hourmeter->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
              <br></br>
                <form action="{{ route('hourmeter.destroy', $hourmeter->id) }}" method="post">
                @csrf
                @method('DELETE')

                <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

                </form>
              </td>


          </tr>

          @endforeach
        </tbody>
      </table>
      {{ $hourmeters->links() }}
    </div>
</div>
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">IMPORT DATA</h5>

          </div>
          <form action="{{ route('hourmeter.import') }}" method="POST" enctype="multipart/form-data">
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
