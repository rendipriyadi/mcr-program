@extends('templating.default')

@php
    $title ="Create Plan Distance";
    $preTitle ="";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('plandistance.store') }}" class="" method="post">
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
        <input type="date" name="tanggal_plandistance"class="form-control

        @error('tanggal_plandistance')

          is-invalid

        @enderror " name="example-text-input" value="{{ old('tanggal_plandistance') }}">

        @error('tanggal_plandistance')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
    </div>
    <div class="col-sm-3">
        <label class="form-label">Plan Distance OB</label>
        <input type="text" name="plan_distanceob"class="form-control

        @error('plan_distanceob')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Qty" value="{{ old('plan_distanceob') }}">
      @error('plan_distanceob')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>

      <div class="col-sm-3">
        <label class="form-label">Plan Distance Coal</label>
        <input type="text" name="plan_distancecoal"class="form-control

        @error('plan_distancecoal')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Qty" value="{{ old('plan_distancecoal') }}">
      @error('plan_distancecoal')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>



      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        {{--  <a href="{{ route('plandistance.index') }}" class="btn btn-link" data-bs-dismiss="modal">
          Cancel
        </a>  --}}
      </div>
   </form>
</div>
</div>


@endsection
