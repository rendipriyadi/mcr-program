@extends('templating.default')

@php
    $title ="Create Fuel";
    $preTitle ="";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('fuel.store') }}" class="" method="post">
    @csrf

    <div class="mb-3">
        <label class="form-label">Site</label>
        <select class="form-control" id="site-option" name="sitecode">
          <option value="">--Site--</option>
          @foreach ($site as $site)
             <option value="{{ $site }}">{{ $site->sitecode }}</option>
          @endforeach
       </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" name="fueldate"class="form-control
        @error('fueldate')

          is-invalid

        @enderror" id="fueldate" placeholder="Input Date" value="{{ old('fueldate') }}">
        @error('fueldate')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Shift</label>
        <select class="form-control" id="shift-option" name="shiftcode">
          <option value="">--Shift--</option>
          @foreach ($shift as $shift)
             <option value="{{ $shift }}">{{ $shift->shift }}</option>
          @endforeach
       </select>
      </div>
      <div class="mb-3">
        <label for="equipment-select">CN Unit</label>
        <select id="equipment-select" onchange="selectEquipment()" name="fuelcnunit" class="form-select @error('fuelcnunit')

        is-invalid

      @enderror"  value="{{ old('fuelcnunit') }}">
      @error('fuelcnunit')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror>
            <option value="default">Choose A CN Unit</option>
            @foreach ($equipfuel as $equipfuel)
                <option value="{{ $equipfuel }}">{{$equipfuel->codeunit}}</option>
            @endforeach
        </select>

            <script>
              function selectEquipment() {
                  let select = document.getElementById('equipment-select');
                  let type_code = document.getElementById('type');
                  let fuel_model = document.getElementById('modelunit');
                  if(select.value === 'default') {
                      type_code.value = '';
                  } else {
                      type_code.value = JSON.parse(select.value).type;
                      fuel_model.value = JSON.parse(select.value).modelunit;
                  }
              }
          </script>
      </div>
      <div class="mb-3">
        <label for="type">Type</label>
        <input name="typecode" class="form-control @error('typecode')

        is-invalid

      @enderror" id="type" placeholder="Type"  value="{{ old('typecode') }}" readonly>
      @error('typecode')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label for="modelunit">Model</label>
        <input name="fuelmodel" class="form-control @error('fuelmodel')

        is-invalid

      @enderror" id="modelunit" placeholder="Model" value="{{ old('fuelmodel') }}" readonly>
      @error('fuelmodel')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">HM Pengisian Sebelumnya </label>
        <input type="text" name="hmbefore"class="form-control

        @error('hmbefore')

        is-invalid

      @enderror" id="hmbefore" placeholder="Input Hourmeter Before" value="{{ old('hmbefore') }}">
      @error('hmbefore')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">HM Pengisian</label>
        <input type="text" name="hmstart"class="form-control

        @error('hmstart')

          is-invalid

        @enderror" id="hmstart" placeholder="Input Hourmeter Start" value="{{ old('hmstart') }}">
        @error('hmstart')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>

       <div class="mb-3">
        <label class="form-label">Total (Hours)</label>
        <input type="text" name="fueltotal"class="form-control

        @error('fueltotal')

        is-invalid

      @enderror" id="fueltotal" placeholder="Input Total" value="{{ old('fueltotal') }}" readonly>
      @error('fueltotal')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
          <script type="text/javascript">
            $(document).ready(function() {
                $("#hmstart, #hmbefore").keyup(function() {
                    var hmbefore  = $("#hmbefore").val();
                    var hmstart = $("#hmstart").val();
                    hmbefore = hmbefore.replace(",", ".");
                    hmstart = hmstart.replace(",", ".");

                    var fueltotal = (parseInt(hmstart)-parseInt(hmbefore));
                    $("#fueltotal").val((fueltotal).toFixed(2));
                });
            });
        </script>
      </div>
       <div class="mb-3">
        <label class="form-label">Fuel Usage (Ltr)</label>
        <input type="text" name="fuelusage"class="form-control

        @error('fuelusage')

        is-invalid

      @enderror" id="fuelusage" placeholder="Input Fuel Usage" value="{{ old('fuelusage') }}">
      @error('fuelusage')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Fuel Cons</label>
        <input type="text" name="fuelcons"class="form-control

        @error('fuelcons')

        is-invalid

      @enderror" id="fuelcons" placeholder="Input Fuel Cons" value="{{ old('fuelcons') }}" readonly>
      @error('fuelcons')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
          <script type="text/javascript">
            $(document).ready(function() {
                $("#fuelusage, #fueltotal").keyup(function() {
                    var fueltotal  = $("#fueltotal").val();
                    var fuelusage = $("#fuelusage").val();
                    fueltotal = fueltotal.replace(",", ".");
                    fuelusage = fuelusage.replace(",", ".");

                    var fuelcons = (parseInt(fuelusage)/parseInt(fueltotal));
                    $("#fuelcons").val((fuelcons).toFixed(2));
                });
            });
        </script>
      </div>
       <div class="mb-3">
        <label class="form-label">Propotional Fuel OB</label>
        <input type="text" name="fuelob"class="form-control

        @error('fuelob')

        is-invalid

      @enderror" id="fuelob" placeholder="Input Fuel OB" value="{{ old('fuelob') }}">
      @error('fuelob')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
       <div class="mb-3">
        <label class="form-label">Propotional Fuel Coal</label>
        <input type="text" name="fuelcoal"class="form-control

        @error('fuelcoal')

        is-invalid

      @enderror" id="fuelcoal" placeholder="Input Fuel Coal" value="{{ old('fuelcoal') }}">
      @error('fuelcoal')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
        <div class="mb-3">
        <label class="form-label">Propotional Fuel Coal Transport</label>
        <input type="text" name="fuelcoaltransport"class="form-control

        @error('fuelcoaltransport')

        is-invalid

      @enderror" id="fuelcoaltransport" placeholder="Input Fuel Coal" value="{{ old('fuelcoaltransport') }}">
      @error('fuelcoaltransport')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>


      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-success">

      </div>
   </form>
</div>
</div>


@endsection
