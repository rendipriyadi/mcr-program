@extends('templating.default')

@php
    $title ="Create Customer";
    $preTitle ="";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('customer.store') }}" class="" method="post">
    @csrf

    <div class="mb-3">
        <label class="form-label">Code Customer</label>
        <input type="text" name="cscode"class="form-control

        @error('cscode')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input Code Customer" value="{{ old('cscode') }}">

        @error('cscode')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <input type="text" name="csdescript"class="form-control
        @error('csdescript')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Deskripsi" value="{{ old('csdescript') }}">
        @error('csdescript')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <input type="text" name="csaddress"class="form-control

        @error('csaddress')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Alamat" value="{{ old('csaddress') }}">
      @error('csaddress')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Telp</label>
        <input type="text" name="cstelp"class="form-control

        @error('cstelp')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Telepon" value="{{ old('cstelp') }}">
        @error('cstelp')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>

      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        <a href="{{ route('customer.index') }}" class="btn btn-danger" data-bs-dismiss="modal">
          Cancel
        </a>
      </div>
   </form>
</div>
</div>


@endsection
