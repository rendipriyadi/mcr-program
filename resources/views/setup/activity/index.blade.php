@extends('templating.default')



@php
    $title ="Setup Data";
    $preTitle ="Plan Performance Activity Type";
@endphp

@push('page-action')



@endpush

@section('isi')

<div class="panel panel-inverse">

    <div class="panel-body">
      <div class="d-flex">
        <div class="ms-2 d-inline-block">
            <a href="{{ route('activity.create') }}" class="btn btn-primary">Create Activity Type</a>
        </div>
      </div>
    </div>
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
          <tr>
            <th>Plan Performance Activity Type Code</th>
            <th>Plan Performance Activity Type Description</th>

            <th width="1%"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($activitys as $activi)


          <tr>
            <td>{{ $activi->dedicatedcode}}</td>
            <td>{{ $activi->dedicateddesc}}</td>

            <td>
              <a href="{{ route('activity.edit', $activity->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
            <br></br>
              <form action="{{ route('activity.destroy', $activity->id) }}" method="post">
              @csrf
              @method('DELETE')

              <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

              </form>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
      {{ $activitys->links() }}
    </div>
</div>

@endsection
