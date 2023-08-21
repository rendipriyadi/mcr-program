@extends('templating.default')



@php
    $title ="Data Equipment";
    $preTitle ="";
@endphp

@push('page-action')


@endpush

@section('isi')

<div class="panel panel-inverse">

  <div class="panel-body">
    <div class="d-flex">
      <div class="ms-2 d-inline-block">
        <a href="{{ route('equipment.create') }}" class="btn btn-primary">Create New Equipment</a>
        {{--  <a type="button" class="btn btn-success" data-bs-toggle="modal" href="#import">
          Upload
        </a>  --}}
        <a href="{{ route('equipment.export') }}" class="btn btn-purple ">Export</a>
      </div>
    </div>
  </div>
  <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
          <tr>
            <th>Category </th>
            <th>Type</th>
            <th>Model Unit</th>
            <th>Code Unit</th>

            <th width='5%'>Site</th>
            <th width='5%'>Status</th>


          </tr>
        </thead>
        <tbody>
            @foreach ($equips as $equipment)


          <tr>
            <td>{{ $equipment->category}}</td>
            <td>{{ $equipment->type}}</td>
            <td>{{ $equipment->modelunit}}</td>
            <td>{{ $equipment->codeunit}}</td>

            <td>{{ $equipment->sitecode }}</td>

            <td>

                @if( $equipment->status == 'active' )
             <form action="{{ route('equipment.toggleStatus', $equipment->id) }}" method="POST">
            @csrf
            @method('POST')
             <button type="submit" class="btn btn-success">Active</button>
             </form>
            @else
            <form action="{{ route('equipment.toggleStatus', $equipment->id) }}" method="POST">
             @csrf
             @method('POST')
                <button type="submit" class="btn btn-danger">Inactive</button>
            </form>
            @endif
            </td>

          </tr>

          @endforeach

        </tbody>
      </table>
      {{--  {{ $equips->links() }}  --}}
    </div>
</div>
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">IMPORT DATA</h5>

          </div>
          <form action="{{ route('equipment.import') }}" method="POST" enctype="multipart/form-data">
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

