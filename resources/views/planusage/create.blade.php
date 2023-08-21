@extends('templating.default')

@php
    $title ="Input Plan Fuel Usage";
    $preTitle ="";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('planusage.store') }}" class="" method="post">
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
        <input type="month" name="tanggal_planusage"class="form-control

        @error('tanggal_planusage')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input NIK" value="{{ old('tanggal_planusage') }}">

        @error('tanggal_planusage')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
    </div>
    <div class="col-sm-3">
        <label class="form-label">Fuel Usage</label>
        <input type="Input" name="fuelusage"class="form-control

        @error('fuelusage')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input Fuel Usage" value="{{ old('fuelusage') }}">

        @error('fuelusage')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>



      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        {{--  <a href="{{ route('planusage.index') }}" class="btn btn-link" data-bs-dismiss="modal">
          Cancel
        </a>  --}}
      </div>
   </form>
</div>
</div>


@endsection
