@extends('templating.default')



@php
    $title ="Setup Data";
    $preTitle ="Plan Performance Item";
@endphp

@push('page-action')



@endpush

@section('isi')
<div class="panel panel-inverse">

    <div class="panel-body">
      <div class="d-flex">
        <div class="ms-2 d-inline-block">
            <a href="{{ route('performance.create') }}" class="btn btn-primary">Create Performance Item</a>
        </div>
      </div>
    </div>
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
          <tr>
            <th>Performance Item Code</th>
            <th>Performance Item Description</th>


            <th width="1%"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($performans as $performance)


          <tr>
            <td>{{ $performance->performancecode}}</td>
            <td>{{ $performance->performancedesc}}</td>


            <td>
              <a href="{{ route('performance.edit', $performance->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
            <br></br>
              <form action="{{ route('performance.destroy', $performance->id) }}" method="post">
              @csrf
              @method('DELETE')

              <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

              </form>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
      {{ $performans->link() }}
    </div>
</div>

@endsection
