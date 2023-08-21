@extends('templating.default')



@php
    $title ="Data Status Unit";
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
                    <a href="{{ route('statusunit.create') }}" class="btn btn-success">Create Status Unit</a>
                    <a type="button" class="btn btn-info" data-bs-toggle="modal" href="#import">
                      Upload
                  </a>
                    <a href="{{ route('statusunit.export') }}" class="btn btn-purple ">Export</a>
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
            <th class="text-nowrap" >NIK Operator</th>
            <th>Operator</th>
            <th>CN Unit</th>
            <th>Model</th>
            <th class="text-nowrap">Item Category</th>
            <th>Category</th>
            <th>Start</th>
            <th>Stop</th>
            <th class="text-nowrap">Total(Hours)</th>
            <th>Shift</th>
            <th>Code</th>
            <th>Dedicated</th>
            <th>Remark</th>
            <th class="w-1"></th>

          </tr>
        </thead>
        <tbody>
            @foreach ($statusunits as $statusunit)


          <tr>
            <td>{{ $statusunit->sitecode}}</td>
            <td>{{ $statusunit->statusunitdate}}</td>

            <td>{{ $statusunit->statusnikopt}}</td>
            <td>{{ $statusunit->statusopt}}</td>
            <td>{{ $statusunit->statuscnunit}}</td>
            <td>{{ $statusunit->statusmodel}}</td>
            <td>{{ $statusunit->statusitemcat}}</td>

            <td>{{ $statusunit->statuscategory}}</td>
            <td>{{ $statusunit->statusstart}}</td>
            <td>{{ $statusunit->statusend }}</td>
            <td>{{ $statusunit->statushour}}</td>
            <td>{{ $statusunit->statusshift}}</td>
            <td>{{ $statusunit->statuscode}}</td>
            <td>{{ $statusunit->dedicated}}</td>
            <td>{{ $statusunit->statusremark}}</td>

            <td>
                <a href="{{ route('statusunit.edit', $statusunit->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
              <br></br>
                <form action="{{ route('statusunit.destroy', $statusunit->id) }}" method="post">
                @csrf
                @method('DELETE')

                <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

                </form>
              </td>
          </tr>

          @endforeach
        </tbody>
      </table>
      {{ $statusunits->links() }}
    </div>
</div>
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">IMPORT DATA</h5>

          </div>
          <form action="{{ route('statusunit.import') }}" method="POST" enctype="multipart/form-data">
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
