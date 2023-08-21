@extends('templating.default')

@php

    $title ="Master Data";
    $preTitle ="Edit Operator";

@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('plansupport.update', $plansupport->id) }}" class="" method="post">
    @csrf
    @method('PUT')
    <div class="form-row">

        <div class="col-sm-3">
            <label class="form-label">Site</label>

            <input class="form-select  @error('sitecode')

            is-invalid

          @enderror" name="sitecode" value="{{ old('sitecode') ?? $plansupport->sitecode}}" readonly>
          @error('sitecode')

          <span class="invalid-feedback">{{ $message }}</span>

          @enderror
              {{--  <option value="">Site</option>
              @foreach ($site as $sitecode)
                 <option value="{{ $sitecode}}">{{ $sitecode->sitecode }}</option>
              @endforeach  --}}
           </input>

        <div class="sm-3">
            <label class="form-label">Date</label>
            <input type="date" name="tanggal_plansupport"class="form-control

            @error('tanggal_plansupport')

              is-invalid

            @enderror " placeholder="Input NIK" value="{{ old('tanggal_plansupport') ?? $plansupport->tanggal_plansupport }}">

            @error('tanggal_plansupport')

            <span class="invalid-feedback">{{ $message }}</span>

            @enderror
          </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Code Unit</label></label>

            <select class="form-select  @error('codemodelsupport')

            is-invalid

          @enderror" name="codemodelsupport" value="{{ old('codemodelsupport') ?? $plansupport->codemodelsupport }}">
          @error('codemodelsupport')

          <span class="invalid-feedback">{{ $message }}</span>

          @enderror
              <option value="">Code Unit </option>
              @foreach ($codemodelsupport as $codemodelsupport)
                 <option value="{{ $codemodelsupport}}">{{ $codemodelsupport->modelunit }}</option>
              @endforeach
           </select>

          <div class="col-sm-3">
            <label class="form-label">Qty</label>
            <input type="text" name="qty_plansupport"class="form-control

            @error('qty_plansupport')

            is-invalid

          @enderror" name="example-text-input" placeholder="Input Qty" value="{{ old('qty_plansupport') ?? $plansupport->qty_plansupport}}">
          @error('qty_plansupport')

            <span class="invalid-feedback">{{ $message }}</span>

            @enderror
          </div>
          <div class="col-sm-3">
            <label class="form-label">PA</label>
            <input type="text" name="pa_plansupport"class="form-control

            @error('pa_plansupport')

            is-invalid

          @enderror" name="example-text-input" placeholder="Input PA" value="{{ old('pa_plansupport') ?? $plansupport->pa_plansupport }}">
          @error('pa_plansupport')

            <span class="invalid-feedback">{{ $message }}</span>

            @enderror
          </div>
          <div class="col-sm-3">
            <label class="form-label">UA</label></label>
            <input type="text" name="ua_plansupport"class="form-control

            @error('ua_plansupport')

            is-invalid

          @enderror" name="example-text-input" placeholder="Input UA" value="{{ old('ua_plansupport') ?? $plansupport->ua_plansupport }}">
          @error('ua_plansupport')

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
