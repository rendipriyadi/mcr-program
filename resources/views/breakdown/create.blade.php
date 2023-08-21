@extends('templating.default')

@php
    $title ="Create Breakdown";
    $preTitle ="";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('breakdown.store') }}" class="" method="post">
    @csrf

    <div class="mb-3">
      <label class="form-label">Site</label>

      <select class="form-control  @error('sitecode')

      is-invalid

    @enderror" name="sitecode" value="{{ old('sitecode') }}">
    @error('sitecode')

    <span class="invalid-feedback">{{ $message }}</span>

    @enderror
        <option value="">--Choose A Site--</option>
        @foreach ($site as $sitecode)
           <option value="{{ $sitecode}}">{{ $sitecode->sitecode }}</option>
        @endforeach
     </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Shift</label>

      <select class="form-control  @error('shiftcode')

      is-invalid

    @enderror" name="breakshift" value="{{ old('shiftcode') }}">
    @error('shiftcode')

    <span class="invalid-feedback">{{ $message }}</span>

    @enderror
        <option value="">--Choose A Shift--</option>
        @foreach ($shift as $shift)
           <option value="{{ $shift}}">{{ $shift->shift }}</option>
        @endforeach
     </select>
    </div>
      <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" name="breakdate" class="form-control
        @error('breakdate')

          is-invalid

        @enderror" placeholder="Input Date" value="{{ old('breakdate') }}">
        @error('breakdate')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label for="breakcnunit">CN Unit</label>
        <select id="equipment-select" onchange="selectEquipment()" name="breakcnunit" class="form-control @error('breakcnunit')

        is-invalid

      @enderror  value="{{ old('breakcnunit') }}">
      @error('breakcnunit')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror">
            <option value="default">--Choose A CN Unit--</option>
            @foreach ($equip as $equipment)
                <option value="{{ $equipment }}">{{$equipment->codeunit}}</option>
            @endforeach
        </select>

            <script>
              function selectEquipment() {
                  let select = document.getElementById('equipment-select');
                  let code_model = document.getElementById('modelunit');
                  let type = document.getElementById('type');
                  if(select.value === 'default') {
                    code_model.value = '';
                  } else {
                      code_model.value = JSON.parse(select.value).modelunit;
                      type.value = JSON.parse(select.value).type;
                  }
              }
          </script>
      </div>
      <div class="mb-3">
        <label for="breaktype">Type </label>
        <input name="breaktype" class="form-control @error('breaktype')

        is-invalid

      @enderror"  id="type" placeholder="Input Break Type"  value="{{ old('breaktype') }}" readonly>
      @error('breaktype')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
      </div>
      <div class="mb-3">
        <label for="breakmodel">Model</label>
        <input name="breakmodel" class="form-control @error('breakmodel')

        is-invalid

      @enderror"  id="modelunit" placeholder="Input Break Model"  value="{{ old('breakmodel') }}" readonly>
      @error('breakmodel')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Jam Awal B/D </label>
        <input type="text" name="bdawal"class="form-control

        @error('bdawal')

        is-invalid

      @enderror" id="bdawal" placeholder="Input Jam Awal B/D" value="{{ old('bdawal') }}">
      @error('bdawal')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Jam Akhir B/D</label>
        <input type="text" name="bdakhir"class="form-control

        @error('bdakhir')

          is-invalid

        @enderror" id="bdakhir" placeholder="Input Jam Akhir B/D" value="{{ old('bdakhir') }}">
        @error('bdakhir')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Total B/D(Hours)</label>
        <input type="text" name="breaktotal"class="form-control

        @error('breaktotal')

        is-invalid

      @enderror" id="breaktotal" placeholder="Input Total (Hours)" value="{{ old('breaktotal') }}" readonly>
      @error('breaktotal')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
        $("input").keyup(function(){
            var bdawal = $('#bdawal').val(),
                bdakhir = $('#bdakhir').val(),
            hours = bdakhir.split(':')[0] - bdawal.split(':')[0],
                minutes = bdakhir.split(':')[1] - bdawal.split(':')[1];

            if (bdawal <= "00:00:00" && bdakhir >= "06:00:00"){
              a = 1;
            } else {
              a = 0;
            }

            if (bdawal >= bdakhir){
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

            $('#breaktotal').val((hours-a+b + minutes/60).toFixed(2));
        });
        });
        </script>
      </div>
      <div class="mb-3">
        <label for="bdcategory">B/D Category</label>
        <select id="categori-select" onchange="selectCategori()" name="bdcategory" class="form-control @error('')

        is-invalid

      @enderror"  value="{{ old('') }}">
      @error('')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror>
            <option value="default">--Choose A B/D Category--</option>
            @foreach ($downtime as $downtime)
                <option value="{{ $downtime }}">{{$downtime->dtcategory}}</option>
            @endforeach
        </select>


      </div>
       <div class="mb-3">
        <label class="form-label">Status</label>
        <input type="text" name="breakstatus"class="form-control

        @error('breakstatus')

        is-invalid

      @enderror" placeholder="Input Status" value="{{ old('breakstatus') }}">
      @error('breakstatus')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>



      <div class="mb-3">
        <label class="form-label">BD Description </label>
        <input type="text" name="bddesc" class="form-control

        @error('bddesc')

          is-invalid

        @enderror"  placeholder="Input BD Description" value="{{ old('bddesc') }}">
        @error('bddesc')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        <a href="{{ route('breakdown.index') }}" class="btn btn-link" data-bs-dismiss="modal">
          Cancel
        </a>
      </div>
   </form>
</div>
</div>


@endsection
