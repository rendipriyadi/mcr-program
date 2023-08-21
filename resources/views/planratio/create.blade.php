@extends('templating.default')

@php
    $title ="Create Plan Fuel Ratio";
    $preTitle ="";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('planratio.store') }}" class="" method="post">
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
             <option value="{{ $codemodelhauler}}">{{ $codemodelhauler->codemodelhauler }}</option>
          @endforeach
       </select>

      <div class="col-sm-3">
        <label class="form-label">Qty</label>
        <input type="text" name="qty_planhauler"class="form-control

        @error('qty_planhauler')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Qty" value="{{ old('qty_planhauler') }}">
      @error('qty_planhauler')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="col-sm-3">
        <label class="form-label">PA</label>
        <input type="text" name="pa_planhauler"class="form-control

        @error('pa_planhauler')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input PA" value="{{ old('pa_planhauler') }}">
      @error('pa_planhauler')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="col-sm-3">
        <label class="form-label">UA</label></label>
        <input type="text" name="ua_planhauler"class="form-control

        @error('ua_planhauler')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input UA" value="{{ old('ua_planhauler') }}">
      @error('ua_planhauler')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="col-sm-3">
        <label class="form-label">Produksi</label>
        <input type="text" name="prod_planhauler"class="form-control

        @error('prod_planhauler')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Produksi" value="{{ old('prod_planhauler') }}">
      @error('prod_planhauler')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="col-sm-3">
        <label class="form-label">Produksi Hauler OB</label>
        <input type="text" name="prod_haulerob"class="form-control

        @error('prod_haulerob')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Produksi Hauler OB" value="{{ old('prod_haulerob') }}">
      @error('prod_haulerob')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>


      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        {{--  <a href="{{ route('planratio.index') }}" class="btn btn-link" data-bs-dismiss="modal">
          Cancel
        </a>  --}}
      </div>
   </form>
</div>
</div>


@endsection
