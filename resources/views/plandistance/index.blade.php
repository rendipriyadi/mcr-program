@extends('templating.default')

@php
    $title ="Plan Performance Distance";
    $preTitle ="";
@endphp


@push('page-action')


@endpush
@section('isi')
<div class="panel panel-inverse">

    <div class="panel-body">
      <div class="d-flex">
        <div class="ms-2 d-inline-block">
            <a href="{{ route('plandistance.create') }}" class="btn btn-primary">Create Plan Distance</a>
            {{--  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#import">
              Import
          </button>
            <a href="{{ route('plandistance.export') }}" class="btn btn-purple ">Export</a>  --}}
        </div>
      </div>
    </div>
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>

            <th>Site</th>
            <th>Date</th>
            <th>Plan Distance OB</th>
            <th>Plan Distance Coal</th>

            <th width="1%"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($plandists as $plandistance)


            <tr>
              <td>{{ $plandistance->sitecode}}</td>
              <td>{{ $plandistance->tanggal_plandistance}}</td>
              <td>{{ $plandistance->plan_distanceob}}</td>
              <td>{{ $plandistance->plan_distancecoal}}</td>


              <td>
                <a href="{{ route('plandistance.edit', $plandistance->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
              <br></br>
                <form action="{{ route('plandistance.destroy', $plandistance->id) }}" method="post">
                @csrf
                @method('DELETE')

                <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

                </form>
              </td>
            </tr>

            @endforeach
        </tbody>
      </table>


        {{ $plandists->links() }}
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
                <form action="{{ route('plandistance.import') }}" method="POST" enctype="multipart/form-data">
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
