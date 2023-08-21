@extends('templating.default')

@php
    $title ="Setup Data";
    $preTitle ="Edit Equipment Category";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('equipcategori.store') }}" class="" method="post">
    @csrf
    
     <div class="mb-3"> 
        <label class="form-label">Category Code</label>
        <input type="text" name="categorycode"class="form-control 
        
        @error('categorycode')

          is-invalid
          
        @enderror " name="example-text-input" placeholder="Input Category Code" value="{{ old('categorycode') }}">

        @error('categorycode')

        <span class="invalid-feedback">{{ $message }}</span>
            
        @enderror
      </div> 
      <div class="mb-3">
        <label class="form-label">Category Description</label>
        <input type="text" name="categorydesc"class="form-control
        @error('categorydesc')

          is-invalid
          
        @enderror" name="example-text-input" placeholder="Input Category Description" value="{{ old('categorydesc') }}">
        @error('categorydesc')

        <span class="invalid-feedback">{{ $message }}</span>
            
        @enderror
      </div> 

      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        <a href="{{ route('equipcategori.index') }}" class="btn btn-danger" data-bs-dismiss="modal">
          Cancel
        </a>
      </div>
   </form>
</div>
</div>

    
@endsection