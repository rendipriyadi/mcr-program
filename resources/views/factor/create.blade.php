@extends('templating.default')

@php
    $title ="Create Site Factor";
    $preTitle =" ";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('factor.store') }}" class="" method="post">
    @csrf

    <div class="mb-3">
        <label class="form-label">Site Factor Code</label>
        <input type="text" name="sitefactorcode"class="form-control

        @error('sitefactorcode')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input Site Factor Code" value="{{ old('sitefactorcode') }}">

        @error('sitefactorcode')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Site</label>
        <input type="text" name="sitecode"class="form-control
        @error('sitecode')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Site" value="{{ old('sitecode') }}">
        @error('sitecode')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Factor Code</label>
        <input type="text" name="factorcode"class="form-control

        @error('factorcode')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Factor Code" value="{{ old('factorcode') }}">
      @error('factorcode')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Start</label>
        <input type="text" name="startdate"class="form-control

        @error('startdate')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Start" value="{{ old('startdate') }}">
        @error('startdate')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">End</label>
        <input type="text" name="enddate"class="form-control

        @error('enddate')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input End" value="{{ old('enddate') }}">

        @error('enddate')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>

      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        {{--  <a href="{{ route('factor.index') }}" class="btn btn-danger" data-bs-dismiss="modal">
          Cancel
        </a>  --}}
      </div>
   </form>
</div>
</div>


@endsection
