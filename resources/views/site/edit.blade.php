@extends('templating.default')

@php
    $title ="Edit Site";
    $preTitle ="";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('site.update',$site->id) }}" class="" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Site Code</label>
        <input type="text" name="sitecode"class="form-control

        @error('sitecode')

          is-invalid

        @enderror " name="example-text-input" placeholder="Input Site Code" value="{{ old('sitecode') ?? $site->sitecode }}">

        @error('sitecode')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <input type="text" name="sitedesc"class="form-control
        @error('sitedesc')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Description" value="{{ old('sitedesc') ?? $site->sitedesc}}">
        @error('sitedesc')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Address</label>
        <input type="text" name="siteaddress"class="form-control

        @error('siteaddress')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Address" value="{{ old('siteaddress') ?? $site->siteaddress}}">
      @error('siteaddress')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Customer Code</label>
        <input type="text" name="customercode"class="form-control

        @error('customercode')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Customer" value="{{ old('customercode') ?? $site->customercode}}">
        @error('customercode')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>




      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        <a href="{{ route('site.index') }}" class="btn btn-danger" data-bs-dismiss="modal">
          Cancel
        </a>
      </div>
   </form>
</div>
</div>


@endsection
