@extends('templating.default')



@php
    $title ="Payload";
    $preTitle ="";
@endphp

@push('page-action')

<a type="button" class="btn btn-success" data-bs-toggle="modal" href="#import">
  Import
</a>
<a href="{{ route('payload.export') }}" class="btn btn-purple ">Export</a>

@endpush

@section('isi')


<div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>

            <th>Site</th>
            <th>Date</th>
            <th>Equipment</th>
            <th>Time</th>
            <th>Shift 1</th>
            <th>Shift 2</th>
            <th>Total Shift</th>
            <th>Total BCM</th>


            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($hourly as $hourly)


          <tr>
            <td>{{ $hourly->ritasi->material }}</td>
            <td>{{ $hourly->ritasi->sitecode}}</td>
            <td>{{ $hourly->ritasi->date}}</td>
            <td>{{ $hourly->ritasi->codeloader}}</td>
            <td>{{ $hourly->ritasi->time}}
            <td>{{ $hourly->shift1}}</td>
            <td>{{ $hourly->shift2}}</td>
            <td>{{ $hourly->totalshift}}</td>
            <td>{{ $hourly->totalbcm}}</td>



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
