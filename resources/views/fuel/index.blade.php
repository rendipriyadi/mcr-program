@extends('templating.default')



@php
    $title ="Data Fuel";
    $preTitle ="";
@endphp


@section('isi')
<div class="panel panel-inverse">

    <div class="panel-body">
      <div class="d-flex">
        <div class="ms-2 d-inline-block">
            <div class="pull-right">
                <div class="pull-right">
                    <a href="{{ route('fuel.create') }}" class="btn btn-primary">Create Fuel</a>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" href="#import">
                        Upload
                    </button>
                    <a href="{{ route('fuel.export') }}" class="btn btn-purple ">Export</a>
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
            <th>Type Code</th>
            <th>Model</th>
            <th>CN Unit</th>
            <th class="text-nowrap">HM Pengisian Sebelumnya</th>
            <th class="text-nowrap">HM Pengisian</th>
            <th class="text-nowrap">Total (Hours)</th>
            <th class="text-nowrap">Fuel Usage (Ltr)</th>
            <th>Fuel Cons</th>
            <th class="text-nowrap">Proportional Fuel OB</th>
            <th class="text-nowrap">Proportional Fuel Coal</th>
            <th class="text-nowrap">Proportional Fuel Coal Transport</th>

<th width="1%"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($fuels as $fuel)


          <tr class="odd gradeX">
            <td>{{ $fuel->sitecode}}</td>
            <td>{{ $fuel->fueldate }}</td>
            <td>{{ $fuel->shiftcode }}</td>
            <td>{{ $fuel->fuelcnunit}}</td>
            <td>{{ $fuel->typecode }}</td>
            <td>{{ $fuel->fuelmodel }}</td>
            <td>{{ $fuel->hmbefore}}</td>
            <td>{{ $fuel->hmstart}}</td>
            <td>{{ $fuel->fueltotal}}</td>
            <td>{{ $fuel->fuelusage}}</td>
            <td>{{ $fuel->fuelcons}}</td>
            <td>{{ $fuel->fuelob}}</td>
            <td>{{ $fuel->fuelcoal }}</td>
            <td>{{ $fuel->fuelcoaltransport }}</td>

            <td>
                <a href="{{ route('fuel.edit', $fuel->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>

                <form action="{{ route('fuel.destroy', $fuel->id) }}" method="post">
                @csrf
                @method('DELETE')

                <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

                </form>
              </td>
          </tr>

          @endforeach
        </tbody>
      </table>
      {{ $fuels->links() }}

<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">IMPORT DATA</h5>

          </div>
          <form action="{{ route('fuel.import') }}" method="POST" enctype="multipart/form-data">
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

