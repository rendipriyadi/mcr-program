@extends('templating.default')

@php
    $title ="Create Joint Survery";
    $preTitle ="";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('jointsurvey.store') }}" class="" method="post">
    @csrf

    <div class="mb-3">
        <label class="form-label">Site</label>

        <select class="form-select  @error('sitecode')

        is-invalid

      @enderror" name="sitecode" value="{{ old('sitecode') }}">
      @error('sitecode')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
          <option value="">-- Site --</option>
          @foreach ($site as $site)
             <option value="{{ $site}}">{{ $site->sitecode }}</option>
          @endforeach
       </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Joint Survey Month</label>
        <input type="month" name="jointmonth"class="form-control
        @error('jointmonth')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Date" value="{{ old('jointmonth') }}">
        @error('jointmonth')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>




      <div class="mb-3">
        <label class="form-tabel">Material</label>
        <select " name="material" class="form-select @error('material')

        is-invalid

      @enderror"  value="{{ old('material') }}">
      @error('material')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror">
            <option value="default">-- Material --</option>
            @foreach ($material as $material)
                <option value="{{ $material }}">{{$material->submaterial}}</option>
            @endforeach
        </select>


      </div>


       <div class="mb-3">
        <label class="form-label">Joint Survey : Volume</label>
        <input type="text" name="jointtotal"class="form-control

        @error('jointtotal')

        is-invalid

      @enderror" id="jointtotal" placeholder="Input Total" value="{{ old('jointtotal') }}" >
      @error('totalhm')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror

      </div>




      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        <a href="{{ route('jointsurvey.index') }}" class="btn btn-danger" data-bs-dismiss="modal">
          Cancel
        </a>
      </div>
   </form>
</div>
</div>


@endsection
