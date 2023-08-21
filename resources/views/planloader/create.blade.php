@extends('templating.default')

@php
    $title ="Create Plan Loader";
    $preTitle ="";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('planloader.store') }}" class="" method="post">
    @csrf
<div class="form-row">

    <div class="col-sm-3">
        <label class="form-label">Site</label>

        <select class="form-select  @error('sitecode')

        is-invalid

      @enderror" name="sitecode" value="{{ old('sitecode') }}">
      @error('sitecode')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
          <option value="">Site</option>
          @foreach ($site as $sitecode)
             <option value="{{ $sitecode}}">{{ $sitecode->sitecode }}</option>
          @endforeach
       </select>

    <div class="sm-3">
        <label class="form-label">Date</label>
        <input type="date" name="tanggal_planloader"class="form-control

        @error('tanggal_planloader')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input NIK" value="{{ old('tanggal_planloader') }}">

        @error('tanggal_planloader')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
    </div>
    <div class="col-sm-3">
        <label class="form-label">Code Unit</label></label>

        <select class="form-select  @error('codemodelloader')

        is-invalid

      @enderror" name="codemodelloader" value="{{ old('codemodelloader') }}">
      @error('codemodelloader')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
          <option value="">Code Unit </option>
          @foreach ($codemodelloader as $codemodelloader)
             <option value="{{ $codemodelloader}}">{{ $codemodelloader->codemodelloader }}</option>
          @endforeach
       </select>
    </div>
      <div class="col-sm-3">
        <label class="form-label">Qty</label>
        <input type="text" name="qty_planloader"class="form-control

        @error('qty_planloader')

        is-invalid

      @enderror"  id="qty_planloader" placeholder="Input Qty" value="{{ old('qty_planloader') }}">
      @error('qty_planloader')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="col-sm-3">
        <label class="form-label">PA</label>
        <input type="text" name="pa_planloader"class="form-control

        @error('pa_planloader')

        is-invalid

      @enderror" id="pa_planloader" placeholder="Input PA" value="{{ old('pa_planloader') }}">
      @error('pa_planloader')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="col-sm-3">
        <label class="form-label">UA</label></label>
        <input type="text" name="ua_planloader"class="form-control

        @error('ua_planloader')

        is-invalid

      @enderror"  id="ua_planloader" placeholder="Input UA" value="{{ old('ua_planloader') }}">
      @error('ua_planloader')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="col-sm-3">
        <label class="form-label">Pty</label></label>
        <input type="text" name="pty_planloader"class="form-control

        @error('pty_planloader')

        is-invalid

      @enderror" id="pty_planloader" placeholder="Input Pty" value="{{ old('pty_planloader') }}">
      @error('pty_planloader')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="col-sm-3">
        <label class="form-label">MOHH</label>
        <input type="text" name="mohh_planloader"class="form-control

        @error('mohh_planloader')

        is-invalid

      @enderror" id="mohh_planloader" placeholder="Input Produksi" value="{{ old('mohh_planloader') }}">
      @error('mohh_planloader')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="col-sm-3">
        <label class="form-label">Produksi Loader OB</label>
        <input type="text" name="prod_loaderob"class="form-control

        @error('prod_loaderob')

        is-invalid

      @enderror"  id="prod_loaderob" placeholder="Input Produksi Loader OB" value="{{ old('prod_loaderob') }}" readonly>
      @error('prod_loaderob')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#pa_planloader, #qty_planloader, #ua_planloader, #mohh_planloader").keyup(function() {
                    var qty_planloader  = $("#qty_planloader").val();
                    var pa_planloader = $("#pa_planloader").val();
                    var ua_planloader = $("#ua_planloader").val();
                    var pty_planloader = $("#pty_planloader").val();
                    var mohh_planloader = $("#mohh_planloader").val();
                    pa_planloader = pa_planloader.replace(",", ".","%");
                    qty_planloader = qty_planloader.replace(",", ".");
                    ua_planloader = ua_planloader.replace(",", ".","%");
                    pty_planloader = pty_planloader.replace(",", ".");
                    var prod_loaderob = (parseInt(qty_planloader)*parseFloat(pa_planloader)*parseFloat(ua_planloader)*parseInt(pty_planloader)*parseInt(mohh_planloader));
                    $("#prod_loaderob").val((prod_loaderob).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                });
            });

        </script>
      </div>


      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-success">
        {{--  <a href="{{ route('planloader.index') }}" class="btn btn-link" data-bs-dismiss="modal">
          Cancel
        </a>  --}}
      </div>
   </form>
</div>
</div>


@endsection
