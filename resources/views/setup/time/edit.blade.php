@extends('templating.default')

@php

    $title ="Setup Data";
    $preTitle ="Edit Time";

@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('time.update', $time->id) }}" class="" method="post">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Category</label>
        <input type="text" name="categori"class="form-control

        @error('categori')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Categori" value="{{  old('categori') ?? $time->categori }}">
      @error('categori')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Time</label>
        <input type="text" name="time"class="form-control
        @error('time')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Time" value="{{ old('time') ?? $time->time }}">
      @error('time')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Jam</label>
        <input type="text" name="jam"class="form-control

        @error('jam')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Jam" value="{{ old('jam') ?? $time->jam }}">
      @error('jam')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Shift</label>
        <input type="text" name="shift"class="form-control

        @error('shift')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Shift" value="{{ old('shift') ?? $time->shift }}">
      @error('shift')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Calculation</label>
        <input type="text" name="calculation"class="form-control

        @error('calculation')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Calculation" value="{{ old('calculation') ?? $time->calculation }}">
      @error('calculation')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Number</label>
        <input type="text" name="number"class="form-control

        @error('number')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Number" value="{{ old('number') ?? $time->number}}">
        @error('number')

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
