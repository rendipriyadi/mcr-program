@extends('templating.default')

@php
    $title ="Create New Shift";
    $preTitle =" ";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('shift.store') }}" class="" method="post">
    @csrf

    <div class="mb-3">
        <label class="form-label">Shift Code</label>
        <input type="text" name="shiftcode"class="form-control

        @error('shiftcode')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input Shift Code" value="{{ old('shiftcode') }}">

        @error('shiftcode')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Shift</label>
        <input type="text" name="shift"class="form-control
        @error('shift')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Shift" value="{{ old('shift') }}">
        @error('shift')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Shift Start</label>
        <input type="text" name="startshift"class="form-control
        @error('startshift')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Shift Start" value="{{ old('startshift') }}">
        @error('startshift')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Shift End</label>
        <input type="text" name="endshift"class="form-control
        @error('endshift')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Shift End" value="{{ old('endshift') }}">
        @error('endshift')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>


      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-success">
        {{--  <a href="{{ route('shift.index') }}" class="btn btn-link" data-bs-dismiss="modal">
          Cancel
        </a>  --}}
      </div>
   </form>
</div>
</div>


@endsection
