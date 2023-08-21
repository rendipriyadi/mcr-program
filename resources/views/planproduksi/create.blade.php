@extends('templating.default')

@php
    $title ="Create Plan Production";
    $preTitle ="";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('planproduksi.store') }}" class="" method="post">
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
        <input type="date" name="tanggal_planproduksi"class="form-control

        @error('tanggal_planproduksi')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input NIK" value="{{ old('tanggal_planproduksi') }}">

        @error('tanggal_planproduksi')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
    </div>


      <div class="col-sm-3">
        <label class="form-label">Plan Site</label>
        <input type="text" name="plan_site"class="form-control

        @error('plan_site')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Qty" value="{{ old('plan_site') }}">
      @error('plan_site')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="col-sm-3">
        <label class="form-label">Plan Budget</label>
        <input type="text" name="plan_budget"class="form-control

        @error('plan_budget')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input PA" value="{{ old('plan_budget') }}">
      @error('plan_budget')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>


      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        {{--  <a href="{{ route('planproduksi.index') }}" class="btn btn-link" data-bs-dismiss="modal">
          Cancel
        </a>  --}}
      </div>
   </form>
</div>
</div>


@endsection
