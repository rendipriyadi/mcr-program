@extends('templating.default')

@php
    $title ="Plan Performance Production";
    $preTitle ="";
@endphp


@push('page-action')


@endpush
@section('isi')
<div class="panel panel-inverse">

    <div class="panel-body">
      <div class="d-flex">
        <div class="ms-2 d-inline-block">
            <a href="{{ route('planproduksi.create') }}" class="btn btn-primary">Create Plan Produksi </a>
            {{--  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#import">
              Import
          </button>
            <a href="{{ route('planproduksi.export') }}" class="btn btn-purple ">Export</a>  --}}
        </div>
      </div>
    </div>
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>

            <th>Site</th>
            <th>Date</th>
            <th>Plan Site</th>
            <th>Plan Budget </th>

            <th width="1%"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($planprods as $planproduksi)


            <tr>
              <td>{{ $planproduksi->sitecode}}</td>
              <td>{{ $planproduksi->tanggal_planproduksi}}</td>
              <td>{{ $planproduksi->plan_site}}</td>
              <td>{{ $planproduksi->plan_budget }}</td>


              <td>
                <a href="{{ route('planproduksi.edit', $planproduksi->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
              <br></br>
                <form action="{{ route('planproduksi.destroy', $planproduksi->id) }}" method="post">
                @csrf
                @method('DELETE')

                <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

                </form>
              </td>
            </tr>

            @endforeach
        </tbody>
      </table>


        {{ $planprods->links() }}
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
                <form action="{{ route('planproduksi.import') }}" method="POST" enctype="multipart/form-data">
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
