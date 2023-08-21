@extends('templating.default')



@php
    $title ="Setup Data";
    $preTitle ="Truck Factor";
@endphp

@push('page-action')


@endpush

@section('isi')

<div class="panel panel-inverse">

    <div class="panel-body">
      <div class="d-flex">
        <div class="ms-2 d-inline-block">
            <a href="{{ route('faktor.create') }}" class="btn btn-primary">Create Truck Factor</a>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" href="#import">
            Upload
            </button>
            <a href="{{ route('faktor.export') }}" class="btn btn-purple ">Export </a>
        </div>
      </div>
    </div>
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
          <tr>

            <th>Truck Model</th>
            <th>Factor</th>
            <th>Site</th>

            <th width="1%"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($factors as $factor)


          <tr>

            <td>{{ $factor->truck}}</td>
            <td>{{ $factor->factor}}</td>
            <td>{{ $factor->sitecode}}</td>
            <td>
              <a href="{{ route('faktor.edit', $factor->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
            <br></br>
              <form action="{{ route('faktor.destroy', $factor->id) }}" method="post">
              @csrf
              @method('DELETE')

              <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

              </form>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
      {{--  {{ $factors->links() }}  --}}
    </div>
</div>
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">IMPORT DATA</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="{{ route('faktor.import') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                  <div class="form-group">
                      <label>PILIH FILE</label>
                      <input type="file" name="file" class="form-control" required>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                  <button type="submit" class="btn btn-success">IMPORT</button>
              </div>
          </form>
      </div>
  </div>
</div>
@endsection
