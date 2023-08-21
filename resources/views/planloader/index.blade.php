@extends('templating.default')

@php
    $title ="Plan Performance Loader";
    $preTitle ="";
@endphp


@push('page-action')


@endpush
@section('isi')
<div class="panel panel-inverse">

    <div class="panel-body">
      <div class="d-flex">
        <div class="ms-2 d-inline-block">
            <a href="{{ route('planloader.create') }}" class="btn btn-primary">Create Plan Loader</a>
            {{--  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#import">
              Import
          </button>
            <a href="{{ route('planloader.export') }}" class="btn btn-purple ">Export</a>  --}}
        </div>
      </div>
    </div>
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
            <thead>

                <th>Site</th>
                <th>Date</th>
                <th>Code Unit</th>
                <th>Qty </th>
                <th>PA </th>
                <th>UA </th>
                <th>PTY</th>
                <th>MOHH</th>
                <th>Produksi Loader OB</th>
                <th width="1%"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($planloads as $planloader)


                <tr>
                  <td>{{ $planloader->sitecode}}</td>
                  <td>{{ $planloader->tanggal_planloader}}</td>
                  <td>{{ $planloader->codemodelloader}}</td>
                  <td>{{ $planloader->qty_planloader }}</td>
                  <td>{{ $planloader->pa_planloader}}</td>
                  <td>{{ $planloader->ua_planloader}}</td>
                  <td>{{ $planloader->pty_planloader}}</td>
                  <td>{{ $planloader->mohh_planloader}}</td>
                  <td>{{ $planloader->prod_loaderob }}</td>


                  <td>
                    <a href="{{ route('planloader.edit', $planloader->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
                  <br></br>
                    <form action="{{ route('planloader.destroy', $planloader->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

                    </form>
                  </td>
                </tr>

                @endforeach
            </tbody>
          </table>

        {{--  {{ $planloads->links() }}  --}}
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
                <form action="{{ route('planloader.import') }}" method="POST" enctype="multipart/form-data">
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
