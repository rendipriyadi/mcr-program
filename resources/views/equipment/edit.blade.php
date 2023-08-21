@extends('templating.default')

@php

    $title ="Edit Customer";
    $preTitle ="";

@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('equipment.update', $equipment->id) }}" class="" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Code</label>
        <input type="text" name="cscode"class="form-control
        @error('cscode')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Code" value="{{  old('cscode') ?? $equipment->cscode }}">
      @error('cscode')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <input type="text" name="csdescript"class="form-control
        @error('csdescript')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Deskripsi" value="{{ old('csdescript') ?? $equipment->csdescript }}">
      @error('csdescript')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <input type="text" name="csaddress"class="form-control
        @error('csaddress')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Alamat" value="{{ old('csaddress') ?? $equipment->csaddress }}">
      @error('csaddress')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Telp</label>
        <input type="text" name="cstelp"class="form-control
        @error('cstelp')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input No. Telepon" value="{{ old('cstelp') ?? $equipment->cstelp }}">
      @error('cstelp')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
      </div>

      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
      </div>
   </form>
</div>
</div>


@endsection
