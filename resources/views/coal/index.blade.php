@extends('templating.default')



@php
    $title ="Coal Expose";
    $preTitle ="";
@endphp

@push('page-action')



@endpush

@section('isi')


<div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>Material</th>
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

@endsection
