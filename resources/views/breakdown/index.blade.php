@extends('templating.default')



@php
    $title ="Data Breakdown";
    $preTitle ="";
@endphp



@section('isi')

<div class="panel panel-inverse">

    <div class="panel-body">
      <div class="d-flex">
        <div class="ms-2 d-inline-block">
            <div class="pull-right">
                <div class="pull-right">
                    <a href="{{ route('breakdown.create') }}" class="btn btn-primary">Create Breakdown</a>
                    <a type="button" class="btn btn-success" data-bs-toggle="modal" href="#import">
                      Upload
                    </a>
                    <a href="{{ route('breakdown.export') }}" class="btn btn-purple ">Export</a>
                    </div>
            </div>

        </div>
      </div>
    </div>
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
          <tr>
            <th >Site</th>
            <th>Date</th>
            <th>Shift</th>
            <th class="text-nowrap">Type Code</th>
            <th>Model</th>
            <th>CN Unit</th>
            <th class="text-nowrap">Jam Awal BD</th>
            <th class="text-nowrap">Jam Akhir BD</th>
            <th class="text-nowrap">Total (Hours)</th>
            <th class="text-nowrap">BD Category</th>

            <th>Status </th>

            <th>BD Description</th>
            <th class="w-1"></th>

          </tr>
        </thead>
        <tbody>
            @foreach ($breaks as $breakdown)


          <tr>
            <td>{{ $breakdown->sitecode}}</td>
            <td>{{ $breakdown->breakdate }}</td>
            <td>{{ $breakdown->breakshift }}</td>
            <td>{{ $breakdown->breaktype}}</td>
            <td>{{ $breakdown->breakmodel}}</td>
            <td>{{ $breakdown->breakcnunit}}</td>
            <td>{{ $breakdown->bdawal}}</td>
            <td>{{ $breakdown->bdakhir}}</td>
            <td>{{ $breakdown->breaktotal}}</td>
            <td>{{ $breakdown->bdcategory}}</td>
            <td>{{ $breakdown->breakstatus}}</td>
            <td>{{ $breakdown->bddesc}}</td>

            <td>
                <a href="{{ route('breakdown.edit', $breakdown->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
              <br></br>
                <form action="{{ route('breakdown.destroy', $breakdown->id) }}" method="post">
                @csrf
                @method('DELETE')

                <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

                </form>
              </td>
          </tr>

          @endforeach
        </tbody>
      </table>
      {{--  {{ $breaks->links() }}  --}}
    </div>
</div>
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">IMPORT DATA</h5>

          </div>
          <form action="{{ route('breakdown.import') }}" method="POST" enctype="multipart/form-data">
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
