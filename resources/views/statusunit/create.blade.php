@extends('templating.default')

@php
    $title ="Input Status Unit";
    $preTitle ="";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('statusunit.store') }}" class="" method="post">
    @csrf


    <div class="mb-3">
      <div class="col-sm-3">
        <label class="form-label">Date</label>
        <input type="date" name="statusunitdate"class="form-control
        @error('statusunitdate')

          is-invalid

        @enderror"  placeholder="Input Date" value="{{ old('statusunitdate') }}">
        @error('statusunitdate')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Site</label>

        <select class="form-control  @error('site')

        is-invalid

      @enderror" name="sitecode" value="{{ old('site') }}">
      @error('site')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
          <option value="">--Site--</option>
          @foreach ($site as $site)
             <option value="{{ $site}}">{{ $site->sitecode }}</option>
          @endforeach
       </select>
      </div>

      <div class="mb-3">

        <label for="operator-select">Operator</label>
        <select id="operator-select" onchange="selectOperator()" name="statusopt" class="form-control @error('statusopt')

        is-invalid

      @enderror  value="{{ old('statusopt') }}">
      @error('statusopt')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror">
            <option value="default">--Choose A Operator--</option>
            @foreach ($operators as $operator)
                <option value="{{ $operator }}">{{$operator->optnama}}</option>
            @endforeach
        </select>

            <script>
              function selectOperator() {
                  let select = document.getElementById('operator-select');
                  let status_nik_opt = document.getElementById('optnik');

                  if(select.value === 'default') {
                      status_nik_opt.value = '';
                  } else {
                      status_nik_opt.value = JSON.parse(select.value).optnik;
                  }
              }
          </script>
      </div>
      <div class="mb-3">
        <label for="optnik">NIK Operator </label>
        <input name="statusnikopt" class="form-control" id="optnik" placeholder="NIK Operator" readonly>
      </div>
      <div class="mb-3">
        <label for="equipment-select">CN Unit</label>
        <select id="equipment-select" onchange="selectEquipment()" name="statuscnunit" class="form-control @error('statuscnunit')

        is-invalid

      @enderror  value="{{ old('statuscnunit') }}">
      @error('statuscnunit')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror">
            <option value="default">--Choose A CN Unit--</option>
            @foreach ($haul as $hauler)
                <option value="{{ $hauler }}">{{$hauler->codeunit}}</option>
            @endforeach
        </select>

            <script>
              function selectEquipment() {
                  let select = document.getElementById('equipment-select');
                  let status_model = document.getElementById('modelunit');

                  if(select.value === 'default') {
                      status_model.value = '';
                  } else {
                      status_model.value = JSON.parse(select.value).modelunit;
                  }
              }
          </script>
      </div>
      <div class="mb-3">
        <label for="modelhauler">Model</label>
        <input name="statusmodel" class="form-control" id="modelunit" placeholder="Model" readonly>
      </div>

      <div class="mb-3">
        <label for="categori-select">Item Category</label>
        <select id="categori-select" onchange="selectCategori()" name="statusitemcat" class="form-control @error('statusitemcat')

        is-invalid

      @enderror  value="{{ old('statusitemcat') }}">
      @error('statusitemcat')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror">
            <option value="default">--Choose Item Category--</option>
            @foreach ($downtime as $downtime)
                <option value="{{ $downtime}}">{{$downtime->dtcategory}}</option>
            @endforeach
        </select>


      </div>
      <div class="mb-3">
        <label for="categori">Category</label>
        <input name="statuscategory" class="form-control" id="categori" placeholder="Category" >
      </div>
      <div class="mb-3">
        <label class="form-label">Start</label>
        <input type="text" name="statusstart"class="form-control

        @error('statusstart')

          is-invalid

        @enderror " id="statusstart" placeholder="Input Start" value="{{ old('statusstart') }}">

        @error('statusstart')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Stop</label>
        <input type="text" name="statusend"class="form-control
        @error('statusend')

          is-invalid

        @enderror" id="statusend" placeholder="Input End" value="{{ old('statusend') }}">
        @error('statusend')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Total(Hours)</label>
        <input type="text" name="statushour"class="form-control
        @error('statushour')

          is-invalid

        @enderror" id="statushour" placeholder="Input Total" value="{{ old('statushour') }}" readonly>
        @error('statushour')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
          <script>
          $(document).ready(function(){
          $("input").keyup(function(){
              var statusstart = $('#statusstart').val(),
               statusend = $('#statusend').val(),

              hours = statusend.split(':')[0] - statusstart.split(':')[0],
                  minutes = statusend.split(':')[1] - statusstart.split(':')[1];

              if (statusstart <= "00:00:00" && statusend >= "06:00:00"){
                a = 1;
              } else {
                a = 0;
              }

              if (statusstart >= statusend){
                b=24;

              } else {
                b=0;
              }
              minutes = minutes.toString().length<2?'0'+minutes:minutes;
              if(minutes<0){
                  hours--;
                  minutes = 60 + minutes;
              }
              hours = hours.toString().length<2?'0'+hours:hours;


              $('#statushour').val((hours-a+b+ minutes/60).toFixed(2));

          });
          });
          </script>
      </div>

    <div class="mb-3">
      <label class="form-label">Dedicated</label>

      <select class="form-control  @error('dedicated')

      is-invalid

    @enderror" name="dedicated" value="{{ old('dedicated') }}">
    @error('dedicated')

    <span class="invalid-feedback">{{ $message }}</span>

    @enderror
        <option value="">--Dedicated--</option>
        @foreach ($dedicated as $dedicated)
           <option value="{{ $dedicated}}">{{ $dedicated->dedicateddesc }}</option>
        @endforeach
     </select>
    </div>
      <div class="mb-3">
        <label class="form-label">Remark</label>
        <input type="text" name="statusremark"class="form-control

        @error('remark')

          is-invalid

        @enderror" placeholder="Input Remark" value="{{ old('remark') }}">
        @error('remark')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Shift</label>
        <select class="form-control" id="shift-option" name="statusshift">
          <option value="">--Shift--</option>
          @foreach ($shift as $shift)
             <option value="{{ $shift }}">{{ $shift->shift }}</option>
          @endforeach
       </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Kode</label>
        <input type="text" name="statuscode"class="form-control
        @error('kode')

          is-invalid

        @enderror" placeholder="Input Kode" value="{{ old('kode') }}">
        @error('kode')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        {{--  <a href="{{ route('statusunit.index') }}" class="btn btn-link" data-bs-dismiss="modal">
          Cancel
        </a>  --}}
      </div>
   </form>
</div>
</div>


@endsection
