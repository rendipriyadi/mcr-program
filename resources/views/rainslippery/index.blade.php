@extends('templating.default')



@php
    $title ="Data Rain & Slippery";
    $preTitle ="";
@endphp

@push('page-action')


@endpush

@section('isi')

<div class="panel panel-inverse">

    <div class="panel-body">
      <div class="d-flex">
        <div class="ms-2 d-inline-block">
            <div class="pull-right">
                <div class="pull-right">
                    <a href="{{ route('rainslippery.create') }}" class="btn btn-primary">Create new Rain & Slippery</a>
                    <a type="button" class="btn btn-success" data-bs-toggle="modal" href="#import">
                      Upload
                  </a>
                    <a href="{{ route('rainslippery.export') }}" class="btn btn-purple ">Export</a>
                    </div>
            </div>

        </div>
      </div>
    </div>
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
          <tr>
            <th>Site</th>
            <th>Date</th>
            <th>Shift</th>
            <th>Rain Start</th>
            <th>Rain End</th>
            <th>Rain (Hours) </th>
            <th>Slippery Start</th>
            <th>Slippery End</th>
            <th>Slippery (Hours)</th>
            <th>Rainfall</th>
            <th class="w-1" ></th>


          </tr>
        </thead>
        <tbody>
            @foreach ($rainslipperys as $rainslippery)


          <tr>
            <td>{{ $rainslippery->sitecode}}</td>
            <td>{{ $rainslippery->rainslipdate}}</td>
            <td>{{ $rainslippery->rainslipshift}}</td>
            <td>{{ $rainslippery->rainstart }}</td>
            <td>{{ $rainslippery->rainend}}</td>
            <td>{{ $rainslippery->rainhour}}</td>
            <td>{{ $rainslippery->slipperystart}}</td>
            <td>{{ $rainslippery->slipperyend }}</td>
            <td>{{ $rainslippery->slipperyhour}}</td>
            <td>{{ $rainslippery->rainfall}}</td>

            <td>
                <a href="{{ route('rainslippery.edit', $rainslippery->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
              <br></br>
                <form action="{{ route('rainslippery.destroy', $rainslippery->id) }}" method="post">
                @csrf
                @method('DELETE')

                <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

                </form>
              </td>
          </tr>

          @endforeach
        </tbody>
      </table>
      {{ $rainslipperys->links() }}
    </div>
</div>
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">IMPORT DATA</h5>

          </div>
          <form action="{{ route('rainslippery.import') }}" method="POST" enctype="multipart/form-data">
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
