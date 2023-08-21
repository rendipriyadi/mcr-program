@extends('templating.default')

@php
    $title ="Setup Data";
    $preTitle ="Tambah";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('faktor.store') }}" class="" method="post">
    @csrf

    <div class="mb-3">
        <label class="form-label">Truck Model</label>
        <input type="text" name="truck"class="form-control

        @error('truck')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input Truck Model" value="{{ old('truck') }}">

        @error('truck')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Factor</label>
        <input type="text" name="factor"class="form-control
        @error('factor')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Factor" value="{{ old('factor') }}">
        @error('factor')

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
