@extends('templating.default')

@php
    $title ="Actual Data";
    $preTitle ="Edit Rain & Slippery";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('rainslippery.update',$rainslippery->id) }}" class="" method="post">
    @csrf
@method('PUT')
    <div class="mb-3">
      <label class="form-label">Site</label>

      <input class="form-control  @error('sitecode')

      is-invalid

    @enderror" name="sitecode" value="{{ old('sitecode') ?? $rainslippery->sitecode }}" readonly>
    @error('sitecode')

    <span class="invalid-feedback">{{ $message }}</span>

    @enderror
        {{--  <option value="">--Site--</option>
        @foreach ($site as $sitecode)
           <option value="{{ $sitecode}}">{{ $sitecode->sitecode }}</option>
        @endforeach  --}}
     </input>
    </div>
      <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" name="rainslipdate" class="form-control
        @error('rainslipdate')

          is-invalid

        @enderror"  placeholder="Input Date" value="{{ old('rainslipdate') ?? $rainslippery->rainslipdate}}">
        @error('rainslipdate')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Shift</label>

        <select class="form-control  @error('shiftcode')

        is-invalid

      @enderror" name="rainslipshift" value="{{ old('shiftcode') ?? $rainslippery->rainslipshift }}" >
      @error('shiftcode')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
          <option value="{{ old('shiftcode') ?? $rainslippery->rainslipshift }}">--Shift--</option>
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

        @enderror" id="rainstart" placeholder="Input Rain Start" value="{{ old('rainstart') ?? $rainslippery->rainstart }}">
        @error('rainstart')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Rain End</label>
        <input type="text" name="rainend" class="form-control

        @error('rainend')

          is-invalid

        @enderror " id="rainend" placeholder="Input Rain End" value="{{ old('rainend') ?? $rainslippery->rainend}}">

        @error('rainend')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Rain (Hours)</label>
        <input type="text" name="rainhour"class="form-control

        @error('rainhour')

          is-invalid

        @enderror " id="rainhour" placeholder="Input Rain Hours" value="{{ old('rainhour') ?? $rainslippery->rainhour }}" readonly>

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

        @enderror" id="slipperystart" placeholder="Input Slippery Start" value="{{ old('slipperystart') ?? $rainslippery->slipperystart }}">
        @error('slipperystart')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Slippery End</label>
        <input type="text" name="slipperyend"class="form-control

        @error('slipperyend')

        is-invalid

      @enderror" id="slipperyend" placeholder="Input Slippery End" value="{{ old('slipperyend') ?? $rainslippery->slipperyend }}">
      @error('slipperyend')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Slippery (Hours)</label>
        <input type="text" name="slipperyhour" class="form-control

        @error('slipperyhour')

        is-invalid

      @enderror" id="slipperyhour" placeholder="Input Slippery Hour" value="{{ old('slipperyhour') ?? $rainslippery->slipperyhour }}" readonly>
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

        @enderror" placeholder="Input Rainfall" value="{{ old('rainfall') ?? $rainslippery-> rainfall }}">
        @error('rainfall')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        <a href="{{ route('rainslippery.index') }}" class="btn btn-link" data-bs-dismiss="modal">
          Cancel
        </a>
      </div>
   </form>
</div>
</div>


@endsection
