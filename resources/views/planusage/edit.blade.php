@extends('templating.default')

@php

    $title ="Master Data";
    $preTitle ="Edit Operator";

@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('operator.update', $operator->id) }}" class="" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3"> 
        <label class="form-label">NIK</label>
        <input type="text" name="optnik"class="form-control 
        @error('optnik')

        is-invalid
        
      @enderror" name="example-text-input" placeholder="Input NIK" value="{{  old('optnik') ?? $operator->optnik }}">
      @error('optnik')

      <span class="invalid-feedback">{{ $message }}</span>
          
      @enderror
      </div> 
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="optnama"class="form-control  
        @error('optnama')

        is-invalid
        
      @enderror" name="example-text-input" placeholder="Input Nama Operator" value="{{ old('optnama') ?? $operator->optnama }}">
      @error('optnama')

      <span class="invalid-feedback">{{ $message }}</span>
          
      @enderror 
      </div> 
      <div class="mb-3">
        <label class="form-label">Versatility</label>
        <input type="text" name="optversati"class="form-control 
        @error('optversati')

        is-invalid
        
      @enderror" name="example-text-input" placeholder="Input Versatility" value="{{ old('optversati') ?? $operator->optversati }}">
      @error('optversati')

      <span class="invalid-feedback">{{ $message }}</span>
          
      @enderror
      </div> 
      <div class="mb-3">
        <label class="form-label">Site</label>
        <input type="text" name="optsite"class="form-control 
        @error('optsite')

        is-invalid
        
      @enderror" name="example-text-input" placeholder="Input Site" value="{{ old('optsite') ?? $operator->optsite }}">
      @error('optsite')

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