@extends('templating.default')

@php
    $title =" Data Operator";
    $preTitle ="";
@endphp

@push('page-action')



@endpush

@section('isi')
<div class="panel panel-inverse">
    <div class="panel-body">
        <div class="form-row">
            <a href="{{ route('operator.create') }}" class="btn btn-primary">Create Operator </a>
            <a type="button" class="btn btn-success" data-bs-toggle="modal" href="#import">
            Upload
            </a>
            <a href="{{ route('operator.export') }}" class="btn btn-purple ">Export</a>
    </div>
    </div>
    <div class="table-responsive">
        <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
            <th width="1%" >NIK</th>
            <th>Nama Operator</th>
            <th>Versatility</th>
            <th width="1%">Site</th>
            <th width="1%"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($operators as $operator)


            <tr>
              <td>{{ $operator->optnik}}</td>
              <td>{{ $operator->optnama}}</td>
              <td>{{ $operator->optversati}}</td>
              <td>{{ $operator->optsite }}</td>


              <td>
                <a href="{{ route('operator.edit', $operator->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
              <br></br>
                <form action="{{ route('operator.destroy', $operator->id) }}" method="post">
                @csrf
                @method('DELETE')

                <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

                </form>
              </td>
            </tr>

            @endforeach
        </tbody>
      </table>

      <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">IMPORT DATA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('operator.import') }}" method="POST" enctype="multipart/form-data">
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

        {{ $operators->links() }}
      </div>
    </div>





@endsection
