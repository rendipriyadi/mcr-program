@extends('templating.default')

@php
    $title ="Setup Data";
    $preTitle ="Edit Truck Factor";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('faktor.update',$factor->id) }}" class="" method="post">
    @csrf
    <div class="mb-3">
        <label class="form-label">Categori</label>
        <input type="text" name="category"class="form-control

        @error('category')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input Category" value="{{ old('category') }}">

        @error('category')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Type</label>
        <input type="text" name="type"class="form-control

        @error('type')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input Type" value="{{ old('type') }}">

        @error('type')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Code Hauler</label>
        <input type="text" name="codehauler"class="form-control

        @error('codehauler')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input Code Hauler" value="{{ old('codehauler') }}">

        @error('codehauler')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
    <div class="mb-3">
        <label class="form-label">Truck Model</label>
        <input type="text" name="codemodelhauler"class="form-control

        @error('codemodelhauler')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input Truck Model" value="{{ old('codemodelhauler') }}">

        @error('codemodelhauler')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Factor</label>
        <input type="text" name="factor_truck"class="form-control
        @error('factor_truck')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Factor" value="{{ old('factor_truck') }}">
        @error('factor_truck')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>



        <div class="col-sm-3">
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
    </div>
      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        {{--  <a href="{{ route('faktor.index') }}" class="btn btn-danger" data-bs-dismiss="modal">
          Cancel
        </a>  --}}
      </div>
   </form>
</div>
</div>


@endsection
