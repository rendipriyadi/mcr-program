@extends('templating.default')

@php

    $title ="Setup Data";
    $preTitle ="Edit Dedicated";

@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('dedicated.update', $dedicated->id) }}" class="" method="post">
    @csrf
    @method('PUT')


      <div class="mb-3">
        <label class="form-label">Dedicated Code</label>
        <input type="text" name="dedicatedcode"class="form-control

        @error('dedicatedcode')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Dedicated Code" value="{{ old('dedicated') ?? $dedicated->dedicatedcode }}">
      @error('dedicated')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Dedicated Description</label>
        <input type="text" name="dedicateddesc"class="form-control
        @error('dedicateddesc')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Dedicated Description" value="{{ old('dedicateddesc') ?? $dedicated->dedicateddesc }}">
      @error('dedicateddesc')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Sitecode</label>
        <input type="text" name="sitecode"class="form-control
        @error('sitecode')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Sitecode" value="{{ old('sitecode') ?? $dedicated->sitecode }}">
      @error('sitecode')

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
