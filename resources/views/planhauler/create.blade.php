@extends('templating.default')

@php
    $title ="Create Plan Hauler";
    $preTitle ="";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('planhauler.store') }}" class="" method="post">
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
    </div>
    <div class="sm-3">
        <label class="form-label">Tanggal Plan Hauler</label>
        <input type="date" name="tanggal_planhauler"class="form-control

        @error('tanggal_planhauler')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input NIK" value="{{ old('tanggal_planhauler') }}">

        @error('tanggal_planhauler')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Code Unit</label></label>

        <select class="form-select  @error('codemodelhauler')

        is-invalid

      @enderror" name="codemodelhauler" value="{{ old('codemodelhauler') }}">
      @error('codemodelhauler')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
          <option value="">Code Unit </option>
          @foreach ($codemodelhauler as $codemodelhauler)
             <option value="{{ $codemodelhauler}}">{{ $codemodelhauler->modelunit }}</option>
          @endforeach
       </select>

      <div class="col-sm-3">
        <label class="form-label">Qty</label>
        <input type="text" name="qty_planhauler"class="form-control

        @error('qty_planhauler')

        is-invalid

      @enderror" id="qty_planhauler" placeholder="Input Qty" value="{{ old('qty_planhauler') }}">
      @error('qty_planhauler')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="col-sm-3">
        <label class="form-label">PA</label>
        <input type="text" name="pa_planhauler"class="form-control

        @error('pa_planhauler')

        is-invalid

      @enderror" id="pa_planhauler" placeholder="Input PA" value="{{ old('pa_planhauler') }}">
      @error('pa_planhauler')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="col-sm-3">
        <label class="form-label">UA</label></label>
        <input type="text" name="ua_planhauler"class="form-control

        @error('ua_planhauler')

        is-invalid

      @enderror" id="ua_planhauler" placeholder="Input UA" value="{{ old('ua_planhauler') }}">
      @error('ua_planhauler')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="col-sm-3">
        <label class="form-label">Pty</label></label>
        <input type="text" name="pty_planhauler"class="form-control

        @error('pty_planhauler')

        is-invalid

      @enderror" id="pty_planhauler" placeholder="Input Pty" value="{{ old('pty_planhauler') }}">
      @error('pty_planhauler')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="col-sm-3">
        <label class="form-label">MOHH</label>
        <input type="text" name="mohh"class="form-control

        @error('mohh')

        is-invalid

      @enderror" id="mohh" placeholder="Input Produksi" value="{{ old('mohh') }}">
      @error('mohh')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="col-sm-3">
        <label class="form-label">Produksi Hauler OB</label>
        <input type="text" name="prod_haulerob"class="form-control

        @error('prod_haulerob')

        is-invalid

      @enderror" id="prod_haulerob" placeholder="Input Produksi Hauler OB" value="{{ old('prod_haulerob') }}" readonly>
      @error('prod_haulerob')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#pa_planhauler, #qty_planhauler, #ua_planhauler, #mohh").keyup(function() {
                    var qty_planhauler  = $("#qty_planhauler").val();
                    var pa_planhauler = $("#pa_planhauler").val();
                    var ua_planhauler = $("#ua_planhauler").val();
                    var pa_planhauler = $("#pa_planhauler").val();
                    var mohh = $("#mohh").val();
                    pa_planhauler = pa_planhauler.replace(",", ".","%");
                    qty_planhauler = qty_planhauler.replace(",", ".");
                    ua_planhauler = ua_planhauler.replace(",", ".","%");
                    pa_planhauler = pa_planhauler.replace(",", ".");
                    var prod_haulerob = (parseInt(qty_planhauler)*parseFloat(pa_planhauler)*parseFloat(ua_planhauler)*parseInt(pa_planhauler)*parseInt(mohh));
                    $("#prod_haulerob").val((prod_haulerob).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                });
            });

        </script>
      </div>


      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        {{--  <a href="{{ route('planhauler.index') }}" class="btn btn-link" data-bs-dismiss="modal">
          Cancel
        </a>  --}}
      </div>
   </form>
</div>
</div>


@endsection
