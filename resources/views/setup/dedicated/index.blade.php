@extends('templating.default')



@php
    $title ="Setup Data";
    $preTitle ="Dedicated Type";
@endphp

@push('page-action')


@endpush

@section('isi')

<div class="panel panel-inverse">

    <div class="panel-body">
      <div class="d-flex">
        <div class="ms-2 d-inline-block">
            <a href="{{ route('dedicated.create') }}" class="btn btn-primary">Create Dedicated </a>
            {{--  <a type="button" class="btn btn-success" data-bs-toggle="modal" href="#import">
              Upload
            </a>
            <a href="{{ route('dedicated.export') }}" class="btn btn-purple ">Export </a>  --}}
        </div>
      </div>
    </div>
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
          <tr>
            <th>Dedicated Code</th>
            <th>Dedicated Description</th>
            <th>Sitecode</th>

            <th width="1%"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($dedicateds as $dedicated)


          <tr>
            <td>{{ $dedicated->dedicatedcode}}</td>
            <td>{{ $dedicated->dedicateddesc}}</td>
            <td>{{ $dedicated->sitecode }}</td>
            <td>
              <a href="{{ route('dedicated.edit', $dedicated->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
            <br></br>
              <form action="{{ route('dedicated.destroy', $dedicated->id) }}" method="post">
              @csrf
              @method('DELETE')

              <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

              </form>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
      {{ $dedicateds->links() }}
    </div>
</div>
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">IMPORT DATA</h5>

          </div>
          <form action="{{ route('dedicated.import') }}" method="POST" enctype="multipart/form-data">
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
