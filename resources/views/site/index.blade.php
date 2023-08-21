@extends('templating.default')



@php
    $title ="Data Site";
    $preTitle ="";
@endphp

@push('page-action')


@endpush

@section('isi')

<div class="panel panel-inverse">

    <div class="panel-body">
      <div class="d-flex">
        <div class="ms-2 d-inline-block">
            <a href="{{ route('site.create') }}" class="btn btn-primary">Create Site</a>
            {{--  <a type="button" class="btn btn-success" data-bs-toggle="modal" href="#import">
              Upload
            </a>
            <a href="#" class="btn btn-purple ">Export</a>  --}}

        </div>
      </div>
    </div>
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
          <tr>
            <th>Site</th>
            <th>Description</th>
            <th>Address </th>
            <th>Customer Code</th>
            <th width="1%" ></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($site as $site)


          <tr>
            <td>{{ $site->sitecode}}</td>
            <td>{{ $site->sitedesc}}</td>
            <td>{{ $site->siteaddress }}</td>
            <td>{{ $site->customercode }}</td>
            <td>
              <a href="{{ route('site.edit', $site->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
            <br></br>
              <form action="{{ route('site.destroy', $site->id) }}" method="post">
              @csrf
              @method('DELETE')

              <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

              </form>
            </td>
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
