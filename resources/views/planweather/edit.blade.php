@extends('templating.default')

@php

    $title ="Edit Plan Weather";
    $preTitle ="";

@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('planweather.update', $planweather->id) }}" class="" method="post">
    @csrf
    @method('PUT')

    <div class="col-sm-3">
        <label class="form-label">Site</label>

        <input class="form-select  @error('sitecode')

        is-invalid

      @enderror" name="sitecode" value="{{ old('sitecode') ?? $planweather->sitecode }}" readonly>
      @error('sitecode')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
          {{--  <option value="">Site</option>
          @foreach ($site as $sitecode)
             <option value="{{ $sitecode}}">{{ $sitecode->sitecode }}</option>
          @endforeach  --}}
       </input>

    <div class="sm-3">
        <label class="form-label">Date</label>
        <input type="date" name="tanggal_planweather"class="form-control

        @error('tanggal_planweather')

          is-invalid

        @enderror " value="{{ old('tanggal_planweather') ?? $planweather->tanggal_planweather }}">

        @error('tanggal_planweather')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
    </div>

      <div class="col-sm-3">
        <label class="form-label">Plan Rain</label>
        <input type="text" name="plan_rain"class="form-control

        @error('plan_rain')

        is-invalid

      @enderror"  placeholder="Input Plan Rain" value="{{ old('plan_rain') ?? $planweather->plan_rain }}">
      @error('plan_rain')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="col-sm-3">
        <label class="form-label">Plan Slippery</label>
        <input type="text" name="plan_slippery"class="form-control

        @error('plan_slippery')

        is-invalid

      @enderror"  placeholder="Input Plan Slippery" value="{{ old('plan_slippery') ?? $planweather->plan_slippery }}">
      @error('plan_slippery')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="col-sm-3">
        <label class="form-label">Plan Total</label>
        <input type="text" name="plan_total"class="form-control

        @error('plan_total')

        is-invalid

      @enderror"  placeholder="Input Plan Slippery" value="{{ old('plan_total') ?? $planweather->plan_total }}">
      @error('plan_total')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="col-sm-3">
        <label class="form-label">Plan Rainfall</label></label>
        <input type="text" name="plan_rainfall"class="form-control

        @error('plan_rainfall')

        is-invalid

      @enderror" placeholder="Input Plan Rainfall" value="{{ old('plan_rainfall') ?? $planweather->plan_rainfall}}">
      @error('plan_rainfall')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>


      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
      </div>
   </form>
</div>
</div>


@endsection
