@extends('templating.default')



@php
    $title ="Setup Data";
    $preTitle ="Production Problem";
@endphp

@push('page-action')


@endpush

@section('isi')
<div class="panel panel-inverse">

    <div class="panel-body">
      <div class="d-flex">
        <div class="ms-2 d-inline-block">
            <a href="{{ route('problem.create') }}" class="btn btn-primary">Create Prod Problem</a>
            {{--  <a type="button" class="btn btn-success" data-bs-toggle="modal" href="#import">
              Upload
            </a>
            <a href="{{ route('problem.export') }}" class="btn btn-purple ">Export</a>  --}}
        </div>
      </div>
    </div>
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
          <tr>

            <th>Production Problem Description</th>
            <th>Site</th>

            <th width="1%"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($probs as $problem)


          <tr>

            <td>{{ $problem->prodproblem}}</td>
            <td>{{ $problem->sitecode}}</td>

            <td>
              <a href="{{ route('problem.edit', $problem->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
            <br></br>
              <form action="{{ route('problem.destroy', $problem->id) }}" method="post">
              @csrf
              @method('DELETE')

              <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

              </form>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
      {{--  {{ $probs->links() }}  --}}
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
          <form action="{{ route('problem.import') }}" method="POST" enctype="multipart/form-data">
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
