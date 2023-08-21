@extends('templating.default')

@php
    $title ="create Location";
    $preTitle ="";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('location.store') }}" class="" method="post">
    @csrf

    <div class="mb-3">
        <label class="form-label">Block</label>
        <input type="text" name="block"class="form-control

        @error('block')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input Block" value="{{ old('block') }}">

        @error('block')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">PIT</label>
        <input type="text" name="pit"class="form-control
        @error('pit')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input PIT" value="{{ old('pit') }}">
        @error('pit')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Dumping Area </label>
        <input type="text" name="dumpingarea"class="form-control

        @error('dumpingarea')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Dumping Area" value="{{ old('dumpingarea') }}">
      @error('dumpingarea')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Site</label>
        <input type="text" name="sitecode"class="form-control

        @error('sitecode')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input Site" value="{{ old('sitecode') }}">

        @error('sitecode')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>


      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        <a href="{{ route('location.index') }}" class="btn btn-danger" data-bs-dismiss="modal">
          Cancel
        </a>
      </div>
   </form>
</div>
</div>


@endsection
