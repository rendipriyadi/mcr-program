@extends('templating.default')

@php
    $title ="Master Data";
    $preTitle ="Tambah Operator";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('faktor.update') }}" class="" method="post">
    @csrf
    
    <div class="mb-3"> 
      <label class="form-label">Truck Model</label>
      <input type="text" name="model_unit"class="form-control 
      
      @error('model_unit')

        is-invalid
        
      @enderror " name="example-text-input" placeholder="Input Truck Model" value="{{ old('model_unit') }}">

      @error('model_unit')

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
    
    <div class="mb-3">
      <label class="form-label">Site</label>
      <input type="text" name="sitecode"class="form-control
      @error('sitecode')

        is-invalid
        
      @enderror" name="example-text-input" placeholder="Input Site" value="{{ old('sitecode') }}">
      @error('sitecode')

      <span class="invalid-feedback">{{ $message }}</span>
          
      @enderror
    </div> 
      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        <a href="{{ route('faktor.index') }}" class="btn btn-danger" data-bs-dismiss="modal">
          Cancel
        </a>
      </div>
   </form>
</div>
</div>

    
@endsection