@extends('templating.default')

@php
    $title ="Setup Data";
    $preTitle ="Create Down Time";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('downtime.store') }}" class="" method="post">
    @csrf

    <div class="mb-3">
        <label class="form-label">Down Time Category</label>
        <input type="text" name="dtcategory"class="form-control

        @error('dtcategory')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input Down Time Category" value="{{ old('dtcategory') }}">

        @error('dtcategory')

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
        <input type="submit" value="Simpan" class="btn btn-primary">
        <a href="{{ route('downtime.index') }}" class="btn btn-link" data-bs-dismiss="modal">
          Cancel
        </a>
      </div>
   </form>
</div>
</div>


@endsection
