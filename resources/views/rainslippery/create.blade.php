@extends('templating.default')

@php
    $title ="Actual Data";
    $preTitle ="Input Rain & Slippery";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('rainslippery.store') }}" class="" method="post">
    @csrf

    <div class="mb-3">
      <label class="form-label">Site</label>

      <select class="form-control  @error('sitecode')

      is-invalid

    @enderror" name="sitecode" value="{{ old('sitecode') }}">
    @error('sitecode')

    <span class="invalid-feedback">{{ $message }}</span>

    @enderror
        <option value="">--Site--</option>
        @foreach ($site as $sitecode)
           <option value="{{ $sitecode}}">{{ $sitecode->sitecode }}</option>
        @endforeach
     </select>
    </div>
      <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" name="rainslipdate" class="form-control
        @error('rainslipdate')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Date" value="{{ old('rainslipdate') }}">
        @error('rainslipdate')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Shift</label>

        <select class="form-control  @error('shiftcode')

        is-invalid

      @enderror" name="rainslipshift" value="{{ old('shiftcode') }}">
      @error('shiftcode')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
          <option value="">--Shift--</option>
          @foreach ($shift as $shift)
             <option value="{{ $shift}}">{{ $shift->shift }}</option>
          @endforeach
       </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Rain Start</label>
        <input type="text" name="rainstart" class="form-control

        @error('rainstart')

          is-invalid

        @enderror" id="rainstart" placeholder="Input Rain Start" value="{{ old('rainstart') }}">
        @error('rainstart')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Rain End</label>
        <input type="text" name="rainend" class="form-control

        @error('rainend')

          is-invalid

        @enderror " id="rainend" placeholder="Input Rain End" value="{{ old('rainend') }}">

        @error('rainend')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Rain (Hours)</label>
        <input type="text" name="rainhour"class="form-control

        @error('rainhour')

          is-invalid

        @enderror " id="rainhour" placeholder="Input Rain Hours" value="{{ old('rainhour') }}" readonly>

        @error('rainhour')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
          <script>
          $(document).ready(function(){
          $("input").keyup(function(){
              var rainstart = $('#rainstart').val(),
                  rainend = $('#rainend').val(),
              hours = rainend.split(':')[0] - rainstart.split(':')[0],
                  minutes = rainend.split(':')[1] - rainstart.split(':')[1];

              if (rainstart <= "00:00:00" && rainend >= "06:00:00")
              {
                a = 1;
              } else {
                a = 0;
              }

              if(rainstart >= rainend)
              {
                b = 24;
              } else
              {
                b = 0;
              }
              minutes = minutes.toString().length<2?'0'+minutes:minutes;
              if(minutes<0){
                  hours--;
                  minutes = 60 + minutes;
              }
              hours = hours.toString().length<2?'0'+hours:hours;

              $('#rainhour').val((hours-a+b+ minutes/60).toFixed(2));
          });
          });
          </script>
      </div>
      <div class="mb-3">
        <label class="form-label">Slippery Start</label>
        <input type="text" name="slipperystart"class="form-control
        @error('slipperystart')

          is-invalid

        @enderror" id="slipperystart" placeholder="Input Slippery Start" value="{{ old('slipperystart') }}">
        @error('slipperystart')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Slippery End</label>
        <input type="text" name="slipperyend"class="form-control

        @error('slipperyend')

        is-invalid

      @enderror" id="slipperyend" placeholder="Input Slippery End" value="{{ old('slipperyend') }}">
      @error('slipperyend')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Slippery (Hours)</label>
        <input type="text" name="slipperyhour" class="form-control

        @error('slipperyhour')

        is-invalid

      @enderror" id="slipperyhour" placeholder="Input Slippery Hour" value="{{ old('slipperyhour') }}" readonly>
      @error('slipperyhour')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
          <script>
          $(document).ready(function(){
          $("input").keyup(function(){
              var slipperystart = $('#slipperystart').val(),
                  slipperyend = $('#slipperyend').val(),
              hours = slipperyend.split(':')[0] - slipperystart.split(':')[0],
                  minutes = slipperyend.split(':')[1] - slipperystart.split(':')[1];

              if (slipperystart <= "00:00:00" && slipperyend >= "06:00:00")
              {
                c = 1;
              } else {
                c = 0;
              }
              if (slipperystart >= slipperyend)
              {
                d = 24;

              } else
              {
                d = 0;
              }
              minutes = minutes.toString().length<2?'0'+minutes:minutes;
              if(minutes<0){
                  hours--;
                  minutes = 60 + minutes;
              }
              hours = hours.toString().length<2?'0'+hours:hours;

              $('#slipperyhour').val((hours-c+d+ minutes/60).toFixed(2));
          });
          });
          </script>
      </div>
      <div class="mb-3">
        <label class="form-label">Rainfall</label>
        <input type="text" name="rainfall"class="form-control

        @error('rainfall')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Rainfall" value="{{ old('rainfall') }}">
        @error('rainfall')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        {{--  <a href="{{ route('rainslippery.index') }}" class="btn btn-link" data-bs-dismiss="modal">
          Cancel
        </a>  --}}
      </div>
   </form>
</div>
</div>


@endsection
