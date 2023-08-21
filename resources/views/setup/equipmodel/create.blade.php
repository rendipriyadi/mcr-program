@extends('templating.default')

@php
    $title ="Setup Data";
    $preTitle ="Tambah Equipment Model";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('equipmodel.store') }}" class="" method="post">
    @csrf
    <div class="mb-3">
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
    </div>
    <div class="mb-3">
        <label class="form-label">Model Unit </label>
        <input type="text" name="modelunit"class="form-control

        @error('modelunit')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input Model Unit" value="{{ old('modelunit') }}">

        @error('modelunit')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Code Unit</label>
        <input type="text" name="codeunit"class="form-control
        @error('codeunit')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Code Unit" value="{{ old('codeunit') }}">
        @error('codeunit')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Type Unit</label>
        <input type="text" name="type"class="form-control
        @error('type')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Type Unit" value="{{ old('type') }}">
        @error('type')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Activity </label>
        <input type="text" name="equipactivity"class="form-control
        @error('equipactivity')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Activity" value="{{ old('equipactivity') }}">
        @error('equipactivity')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>


      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        {{--  <a href="{{ route('equipmodel.index') }}" class="btn btn-danger" data-bs-dismiss="modal">
          Cancel
        </a>  --}}
      </div>
   </form>
</div>
</div>


@endsection
