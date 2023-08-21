@extends('templating.default')

@php

    $title ="Setup Data";
    $preTitle ="Edit Production Problem";

@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('problem.update', $problem->id) }}" class="" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Site</label>

        <input class="form-select  @error('sitecode')

        is-invalid

      @enderror" name="sitecode" value="{{ old('sitecode') ?? $problem->sitecode }}" readonly>
      @error('sitecode')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
          {{--  <option value="">-- Site --</option>
          @foreach ($site as $sitecode)
             <option value="{{ $sitecode}}">{{ $sitecode->sitecode }}</option>
          @endforeach  --}}
       </input>
      </div>

      <div class="mb-3">
        <label class="form-label">Production Problem</label>
        <input type="text" name="prodproblem"class="form-control
        @error('prodproblem')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Production Problem  " value="{{ old('prodproblem') ?? $problem->prodproblem }}">
        @error('prodproblem')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>

      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        <a href="{{ route('problem.index') }}" class="btn btn-danger" data-bs-dismiss="modal">
          Cancel
        </a>
      </div>
   </form>
</div>
</div>


@endsection
