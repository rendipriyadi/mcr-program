@extends('templating.default')

@php
    $title ="Edit Hour Meter";
    $preTitle ="";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('hourmeter.update',$hourmeter->id)  }}" class="" method="post">
    @csrf
 @method('PUt')
    <div class="mb-3">
        <label class="form-label">Site</label>

        <input class="form-select  @error('sitecode')

        is-invalid

      @enderror" name="sitecode" value="{{ old('sitecode') ?? $hourmeter->sitecode }}" readonly>
      @error('sitecode')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
          {{--  <option value="">-- Site --</option>
          @foreach ($site as $site)
             <option value="{{ $site}}">{{ $site->sitecode }}</option>
          @endforeach  --}}
       </input>
      </div>
      <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" name="datehm"class="form-control
        @error('datehm')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Date" value="{{ old('datehm') ?? $hourmeter->datehm }}">
        @error('datehm')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Shift</label>
        <select class="form-select" id="shift-option" name="shift">
          <option value="">--Shift--</option>
          @foreach ($shift as $shift)
             <option value="{{ $shift }}">{{ $shift->shift }}</option>
          @endforeach
       </select>
      </div>
      <div class="mb-3">
        <label for="opthm">Operator</label>
        <select id="opthm" onchange="selectOperator()" name="opthm" class="form-select @error('opthm')

        is-invalid

      @enderror"  value="{{ old('opthm') ?? $hourmeter->opthm}}">
      @error('opthm')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
            <option value="default">-- Operator Loader --</option>
            @foreach ($operators as $operator)
                <option value="{{ $operator}}">{{$operator->optnama}}</option>

                @endforeach

            <script>
              function selectOperator() {
                  let select = document.getElementById('opthm');
                  let nikopt_hm = document.getElementById('optnik');

                  if(select.value === 'default') {
                      nikopt_hm.value = '';

                  } else {
                      nikopt_hm.value = JSON.parse(select.value).optnik;

                  }
              }
          </script>

           </select>
      </div>

          <div class="mb-3">

            <label for="nikopthm">NIK Operator</label>
            <input name="nikopthm" class="form-control" id="optnik" placeholder="NIK Operator" value="{{ old('nikopthm') ?? $hourmeter->nikopthm }}" readonly>
        </div>

      <div class="mb-3">
        <label for="equipment-select">CN Unit</label>
        <select id="equipment-select" onchange="selectEquipment()" name="cnunithm" class="form-select @error('cnunithm')

        is-invalid

      @enderror"  value="{{ old('cnunithm')  ?? $hourmeter->cnunithm}}">
      @error('cnunithm')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror>
            <option value="default">-- Choose A CN Unit --</option>
            @foreach ($equiphm as $equiphm)
                <option value="{{ $equiphm }}">{{$equiphm->codeunit}}</option>
            @endforeach
        </select>

            <script>
              function selectEquipment() {
                  let select = document.getElementById('equipment-select');

                  let model_hm = document.getElementById('modelunit');
                  if(select.value === 'default') {
                      model_hm.value = '';
                  } else {

                      model_hm.value = JSON.parse(select.value).modelunit;
                  }
              }
          </script>
      </div>

      <div class="mb-3">
        <label for="modelunit">Model</label>
        <input name="modelhm" class="form-control @error('modelhm')

        is-invalid

      @enderror" id="modelunit" placeholder="Model" value="{{ old('modelhm') ?? $hourmeter->modelhm }}" readonly>
      @error('modelhm')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">HM Awal</label>
        <input type="text" name="hmawal"class="form-control

        @error('hmawal')

        is-invalid

      @enderror" id="hmawal" placeholder="Input Hourmeter Start" value="{{ old('hmawal') ?? $hourmeter->hmawal }}">
      @error('hmawal')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">HM Akhir</label>
        <input type="text" name="hmakhir"class="form-control

        @error('hmakhir')

          is-invalid

        @enderror" id="hmakhir" placeholder="Input Hourmeter End" value="{{ old('hmakhir') ?? $hourmeter->hmakhir }}">
        @error('hmakhir')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>

       <div class="mb-3">
        <label class="form-label">Total (Hours)</label>
        <input type="text" name="totalhm"class="form-control

        @error('totalhm')

        is-invalid

      @enderror" id="totalhm" placeholder="Input Total" value="{{ old('totalhm') ?? $hourmeter->totalhm }}" readonly>
      @error('totalhm')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#hmawal, #hmakhir").keyup(function() {
                    var hmakhir  = $("#hmakhir").val();
                    var hmawal = $("#hmawal").val();
                    hmakhir = hmakhir.replace(",", ".");
                    hmawal = hmawal.replace(",", ".");

                    var totalhm = (parseFloat(hmakhir)-parseFloat(hmawal));
                    $("#totalhm").val((totalhm).toFixed(2));
                });
            });
        </script>
      </div>

        <div class="mb-3">
        <label class="form-label">Remark</label>
        <input type="text" name="remarkhm"class="form-control

        @error('remarkhm')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Remark" value="{{ old('remarkhm') ?? $hourmeter->remarkhm }}">
      @error('remarkhm')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>


      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-success">
        {{--  <a href="{{ route('hourmeter.index') }}" class="btn btn-link" data-bs-dismiss="modal">
          Cancel
        </a>  --}}
      </div>
   </form>
</div>
</div>


@endsection
