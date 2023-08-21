@extends('templating.default')

@php
    $title ="Setup Data";
    $preTitle ="Tambah Location";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('lokasi.store') }}" class="" method="post">
    @csrf
    
    <div class="mb-3"> 
        <label class="form-label">Location Code</label>
        <input type="text" name="dedicatedcode"class="form-control 
        
        @error('dedicatedcode')

          is-invalid
          
        @enderror " name="example-text-input" placeholder="Input Location Code" value="{{ old('dedicatedcode') }}">

        @error('dedicatedcode')

        <span class="invalid-feedback">{{ $message }}</span>
            
        @enderror
      </div> 
      <div class="mb-3">
        <label class="form-label">Location Description</label>
        <input type="text" name="dedicateddesc"class="form-control
        @error('dedicateddesc')

          is-invalid
          
        @enderror" name="example-text-input" placeholder="Input Location Description" value="{{ old('dedicateddesc') }}">
        @error('dedicateddesc')

        <span class="invalid-feedback">{{ $message }}</span>
            
        @enderror
      </div> 
      

      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        <a href="{{ route('lokasi.index') }}" class="btn btn-danger" data-bs-dismiss="modal">
          Cancel
        </a>
      </div>
   </form>
</div>
</div>

    
@endsection