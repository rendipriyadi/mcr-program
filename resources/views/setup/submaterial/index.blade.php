@extends('templating.default')



@php
    $title ="Setup Data";
    $preTitle ="Sub Material";
@endphp

@push('page-action')


@endpush

@section('isi')
<div class="panel panel-inverse">

    <div class="panel-body">
      <div class="d-flex">
        <div class="ms-2 d-inline-block">
            <a href="{{ route('submaterial.create') }}" class="btn btn-primary">Create Sub Material</a>
            <a type="button" class="btn btn-success" data-bs-toggle="modal" href="#import">
              Upload
            </a>
            <a href="{{ route('submaterial.export') }}" class="btn btn-purple ">Export </a>
        </div>
      </div>
    </div>
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
          <tr>
            <th>Sub Material Description</th>
            <th>Sub Material Code</th>
            <th>Material Code </th>
            <th>Material Factor</th>
            <th width="1%"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($submaterials as $submaterial)


          <tr>
            <td>{{ $submaterial->subdesc}}</td>
            <td>{{ $submaterial->subcode}}</td>
            <td>{{ $submaterial->materialcode}}</td>
            <td>{{ $submaterial->materialfactor}}</td>
            <td>
              <a href="{{ route('submaterial.edit', $submaterial->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
            <br></br>
              <form action="{{ route('submaterial.destroy', $submaterial->id) }}" method="post">
              @csrf
              @method('DELETE')

              <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

              </form>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
      {{ $submaterials->links() }}
    </div>
</div>
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">IMPORT DATA</h5>

          </div>
          <form action="{{ route('submaterial.import') }}" method="POST" enctype="multipart/form-data">
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
