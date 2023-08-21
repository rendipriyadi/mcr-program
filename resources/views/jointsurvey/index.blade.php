@extends('templating.default')



@php
    $title =" Data Joint Survey";
    $preTitle ="";
@endphp

{{--  @push('page-action')
<a href="{{ route('jointsurvey.create') }}" class="btn btn-primary">Input Joint Survey</a>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#import">
  Import
</button>
<a href="{{ route('jointsurvey.export')}}" class="btn btn-purple ">Export</a>

@endpush  --}}

@section('isi')
<div class="panel panel-inverse">

    <div class="panel-body">
      <div class="d-flex">
        <div class="ms-2 d-inline-block">
            <a href="{{ route('jointsurvey.create') }}" class="btn btn-primary">Create Joint Survey</a>

        </div>
      </div>
    </div>
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
          <tr>

            <th>Site</th>
            <th>Month</th>
            <th>Material</th>
            <th>Joint Survey:Volume</th>


            <th width="1%"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($jointsurvey as $jointsurvey)
            @php
        // Mengambil bagian bulan dari tanggal (misal: "2023-08" -> "08")
        $month = date('m', strtotime($jointsurvey->jointmonth));

        $monthNames = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
                '04' => 'April',
                '05' => 'May',
                '06' => 'June',
                '07' => 'July',
                '08' => 'August',
                '09' => 'September',
                '10' => 'October',
                '11' => 'November',
                '12' => 'December'
            ];
        @endphp

          <tr>

            <td>{{ $jointsurvey->sitecode}}</td>
            <td>{{ $monthNames[$month] }}</td>
            <td>{{ $jointsurvey->material }}</td>
            <td>{{ $jointsurvey->jointtotal}}</td>
            <td>
                <a href="{{ route('jointsurvey.edit', $jointsurvey->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
              <br></br>
                <form action="{{ route('jointsurvey.destroy', $jointsurvey->id) }}" method="post">
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
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="{{ route('jointsurvey.import') }}" method="POST" enctype="multipart/form-data">
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
