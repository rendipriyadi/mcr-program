@extends('templating.default')

@php
    $title ="Setup Data";
    $preTitle ="Edit Down Time Category";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('downtime.update',$downtime->id) }}" class="" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Down Time Category</label>
        <input type="text" name="dtcategory"class="form-control

        @error('dtcategory')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input Down Time Category" value="{{ old('dtcategory') ?? $downtime->dtcategory}}">

        @error('dtcategory')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="col-sm-3">
        <label class="form-label">Site</label>

        <input class="form-select  @error('sitecode')

        is-invalid

      @enderror" name="sitecode" value="{{ old('sitecode') ?? $downtime->sitecode }}" readonly>
      @error('sitecode')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
          {{--  <option value="">Site</option>
          @foreach ($site as $sitecode)
             <option value="{{ $sitecode}}">{{ $sitecode->sitecode }}</option>
          @endforeach  --}}
       </input>
    </div>


      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        <a href="{{ route('downtime.index') }}" class="btn btn-danger" data-bs-dismiss="modal">
          Cancel
        </a>
      </div>
   </form>
</div>
</div>


@endsection
