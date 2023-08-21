@extends('templating.default')

@php
    $title ="Edit Ritase";
    $preTitle ="";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('ritasi.update', $ritasi->id) }}" class="" method="post">
    @csrf
    @method('PUT')


      <div class="col-sm-3">
       <strong>Date</strong>
        <input type="date" name="date"class="form-control date-picker
        @error('ritasidate')

          is-invalid

        @enderror" placeholder="Input Date" value="{{ old('ritasidate') ?? $ritasi->date}}">
        @error('ritasidate')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
       <strong>Site</strong>

        <input class="form-select  @error('site')

        is-invalid

      @enderror" name="sitecode" value="{{ old('site') ?? $ritasi->sitecode }}  " readonly>
      @error('site')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
          {{--  <option value="">-- Site --</option>
          @foreach ($site as $site)
             <option value="{{ $site}}">{{ $site->sitecode }}</option>
          @endforeach  --}}
       </input>
      </div>
      <div class="mb-3">
        <Strong>Time</Strong>
    <select id="time-select" onchange="selectTime()" name="time" class="form-select  @error('time')

    is-invalid

  @enderror"  value="{{ old('time') ?? $ritasi->time }}">
  @error('time')

  <span class="invalid-feedback">{{ $message }}</span>

  @enderror
        <option value="default">-- Time --</option>
        @foreach ($times as $time)
            <option value="{{ $time }}">{{$time->time}}</option>
        @endforeach

        <script>
          function selectTime() {
              let select = document.getElementById('time-select');
              let shift_time = document.getElementById('shift');

              if(select.value === 'default') {
                  shift_time.value = '';
              } else {
                  shift_time.value = JSON.parse(select.value).shift;
              }
          }
      </script>
        </select>

      </div>
      <div class="mb-3">
        <label for="shift">Shift</label>
        <input name="shift" class="form-control " id="shift"  placeholder="Shift" value="{{ old('shift') ?? $ritasi->shift }}  "readonly>
  </div>
  <div class="mb-3">
    <label for="oploader">Operator Loader</label>
    <select id="oploader" onchange="selectOperatorLoader()" name="oploader" class="form-control @error('oploader')

    is-invalid

  @enderror"  value="{{ old('oploader') ?? $ritasi->oploader}}">
  @error('oploader')

  <span class="invalid-feedback">{{ $message }}</span>

  @enderror
        <option value="default">-- Operator Loader --</option>
        @foreach ($operators as $operator)
            <option value="{{ $operator}}">{{$operator->optnama}}</option>

            @endforeach

        <script>
          function selectOperatorLoader() {
              let select = document.getElementById('oploader');
              let nik_loader = document.getElementById('optnik');

              if(select.value === 'default') {
                  nik_loader.value = '';

              } else {
                  nik_loader.value = JSON.parse(select.value).optnik;

              }
          }
      </script>

       </select>
  </div>
  <div class="mb-3">

    <label for="optnikloader">NIK Loader</label>
    <input name="nikloader" class="form-control @error('optnik')

    is-invalid

  @enderror" id="optnikloader" placeholder="NIK Loader" value="{{ old('optnik') ?? $ritasi->nikloader }}" readonly>
  @error('optnik')

  <span class="invalid-feedback">{{ $message }}</span>

  @enderror
  </div>

      <div class="mb-3">
        <label for="ophauler">Operator Hauler</label>
        <select id="ophauler" onchange="selectOperatorHauler()" name="ophauler" class="form-control @error('ophauler')

        is-invalid

      @enderror" value="{{ old('opthauler') ?? $ritasi->ophauler }}">
      @error('opthauler')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
            <option value="default">-- Operator Hauler --</option>
            @foreach ($operators as $operator)
                <option value="{{ $operator }}">{{$operator->optnama}}</option>
            @endforeach


            <script>
              function selectOperatorHauler() {
                  let select = document.getElementById('ophauler');
                  let nik_hauler = document.getElementById('optnikhauler');

                  if(select.value === 'default') {
                      nik_hauler.value = '';
                  } else {
                      nik_hauler.value = JSON.parse(select.value).optnik;
                  }
              }
          </script>
           </select>
      </div>
      <div class="mb-3">

        <label for="optnikhauler">NIK Hauler</label>
        <input name="nikhauler" class="form-control @error('optnik')

        is-invalid

      @enderror" id="optnikhauler" placeholder="NIK Hauler" value="{{ old('optnik') ?? $ritasi-> nikhauler}}" readonly>
      @error('optnik')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
      </div>
      <div class="mb-3">
        <label for="codeloader">Loader</label>
        <select id="loader-select" onchange="selectLoader()" name="codeloader" class="form-control @error('codeloader')

        is-invalid

      @enderror" value="{{ old('codeloader') ?? $ritasi->codeloader}}" readonly>
      @error('codeloader')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
            <option value="default">-- Loader --</option>
            @foreach ($load as $loader)
                <option value="{{ $loader }}">{{$loader->codeloader}}</option>
            @endforeach


            <script>
              function selectLoader() {
                  let select = document.getElementById('loader-select');
                  let model_loader = document.getElementById('codemodelloader');

                  if(select.value === 'default') {
                      model_loader.value = '';
                  } else {
                      model_loader.value = JSON.parse(select.value).codemodelloader;
                  }
              }
          </script>
           </select>
      </div>
      <div class="mb-3">
        <label for="codemodelloader">Model Loader</label>
        <input name="modelloader" class="form-control @error('modelloader')

        is-invalid

      @enderror"  id="codemodelloader" placeholder="Model Loader" value="{{ old('modelloader') ?? $ritasi->modelloader }}" readonly>
      @error('modelloader')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
      </div>
      <div class="mb-3">
        <label for="codehauler">Hauler</label>
        <select id="hauler-select" onchange="selectHauler()" name="codehauler" class="form-control @error('codehauler')

        is-invalid

      @enderror"  value="{{ old('codehauler') ?? $ritasi->codehauler}}" readonly>
      @error('codehauler')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
            <option value="default">-- Hauler --</option>
            @foreach ($hauler as $hauler)
                <option value="{{ $hauler }}">{{$hauler->codehauler}}</option>
            @endforeach


            <script>
              function selectHauler() {
                  let select = document.getElementById('hauler-select');
                  let model_hauler = document.getElementById('codemodelhauler');
                  let factor_truck = document.getElementById('factor_truck');
                  if(select.value === 'default') {
                      model_hauler.value = '';
                  } else {
                      model_hauler.value = JSON.parse(select.value).codemodelhauler;
                      factor_truck.value = JSON.parse(select.value).factor_truck;
                  }
              }
          </script>
          </select>
      </div>
      <div class="mb-3">
        <label for="codemodelhauler">Model Hauler</label>
        <input name="modelhauler" class="form-control @error('codemodelhauler')

        is-invalid

      @enderror"  id="codemodelhauler" placeholder="Model Hauler"  value="{{ old('modelhauler') ?? $ritasi->modelhauler }}" readonly>
      @error('modelhauler')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
      </div>


      <div class="mb-3">
        <label for="factor_truck">Factor Truck</label>
        <input type="text" name="factortruck" class="form-control @error('factortruck')

        is-invalid

      @enderror"  id="factor_truck" placeholder="Factor Truck" onkeyup="function()"  value="{{ old('factortruck') ?? $ritasi->factortruck }}" readonly>
      @error('factortruck')

      <span class="invalid-feedback">{{ $message }}</span>

      @enderror
      </div>
      <div class="mb-3">
        <label for="block-select">Block</label>
        <select id="block-select" onchange="selectLocation()" name="block" class="form-control" value="{{ old('block') ?? $ritasi->block }}">
            <option value="default"> -- Block --</option>
            @foreach ($locs as $location)
                <option value="{{ $location }}">{{$location->block}}</option>
            @endforeach
        </select>

            <script>
              function selectLocation() {
                  let select = document.getElementById('block-select');
                  let pit = document.getElementById('pit');

                  if(select.value === 'default') {
                      pit.value = '';
                  } else {
                      pit.value = JSON.parse(select.value).pit;
                  }
              }
          </script>
      </div>
      <div class="mb-3">
      <label for="pit">PIT</label>
      <input name="pit" class="form-control" id="pit" placeholder="PIT" value="{{ old('pit') ?? $ritasi->pit }}  "readonly>
      </div>
      <div class="mb-3">
        <label for="submaterial-select">Sub Material</label>
        <select id="submaterial-select" onchange="selectMaterial()" name="submaterial" class="form-control" value="{{ old('submaterial') ?? $ritasi->submaterial }}">
            <option value="default">Sub Material</option>
            @foreach ($materil as $material)
                <option value="{{ $material }}">{{$material->submaterial}}</option>
            @endforeach
        </select>

            <script>
              function selectMaterial() {
                  let select = document.getElementById('submaterial-select');
                  let material = document.getElementById('material');
                  let factor = document.getElementById('factor');

                  if(select.value === 'default') {
                      pit.value = '';
                  } else {
                    material.value = JSON.parse(select.value).material;
                      factor.value = JSON.parse(select.value).factor;
                  }
              }
          </script>
      </div>
      <div class="mb-3">
        <label for="material">Material</label>
        <input name="material" class="form-control" id="material" placeholder="Material" value="{{ old('material') ?? $ritasi->material }}  "readonly>

      </div>
      <div class="mb-3">
        <label for="factor">Factor Material</label>
        <input type="text"name="factor" class="form-control" id="factor" placeholder="Factor Material" value="{{ old('factor') ?? $ritasi->factor }}  " readonly>

      </div>
      <div class="mb-3">
        <label class="form-label">Ritase</label>
        <input type="text" name="ritase"class="form-control

        @error('ritase')

        is-invalid

      @enderror" id="ritase" placeholder="Input Ritase"  onkeyup="function()" value="{{ old('ritase') ?? $ritasi->ritase }}" >
      @error('ritase')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Distance</label>
        <input type="text" name="distance"class="form-control
        @error('distance')

          is-invalid

        @enderror" id="distance" placeholder="Input Distance" value="{{ old('distance') ?? $ritasi->distance }}">
        @error('distance')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>



      <div class="mb-3">
          <label class="form-label">Produksi</label>
          <input type="text" name="produksi"class="form-control
          @error('produksi')

            is-invalid

          @enderror" id="produksi" placeholder="Input Produksi" onkeyup="function()"  value="{{ old('produksi') ?? $ritasi->produksi }}" readonly>
          @error('produksi')

          <span class="invalid-feedback">{{ $message }}</span>

          @enderror

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#factor_truck, #ritase").keyup(function() {
                    var ritase  = $("#ritase").val();
                    var factor_truck = $("#factor_truck").val();
                    ritase = ritase.replace(",", ".");
                    factor_truck = factor_truck.replace(",", ".");

                    var produksi = (parseFloat(ritase)*parseFloat(factor_truck));
                    $("#produksi").val((produksi).toFixed(2));
                });
            });
        </script>
          </div>
         <div class="mb-3">
          <label class="form-label">Adjustment</label>
          <input type="text" name="adjustment"class="form-control

          @error('adjustment')

          is-invalid

        @enderror" id="adjustment" placeholder="Input Adjustment" value="{{ old('adjustment') ?? $ritasi->adjustment }}" readonly>
        @error('adjustment')

          <span class="invalid-feedback">{{ $message }}</span>

          @enderror
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#factor_truck, #ritase, #factor").keyup(function() {
                    var ritase  = $("#ritase").val();
                    var factor_truck = $("#factor_truck").val();
                    var factor = $("#factor").val();

                    factor_truck = factor_truck.replace(",", ".");
                    factor = factor.replace(",", ".");
                    var adjustment = (parseFloat(ritase)*parseFloat(factor_truck)*parseFloat(factor));
                    $("#adjustment").val((adjustment).toFixed(2));
                });
            });
        </script>
        </div>
        <div class="mb-3">
          <label class="form-label">Dist*Vol</label>
          <input type="text" name="distvol"class="form-control

          @error('distvol')

            is-invalid

          @enderror" id="distvol" placeholder="Input Dist*Vol" value="{{ old('distvol') ?? $ritasi->distvol }}" readonly>
          @error('distvol')

          <span class="invalid-feedback">{{ $message }}</span>

          @enderror
          <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#distance, #adjustment").keyup(function() {
                    var adjustment  = $("#adjustment").val();
                    var distance = $("#distance").val();

                    adjustment = adjustment.replace(",", ",");
                    distance = distance.replace(",", ".");

                    var distvol = (parseFloat(adjustment)*parseFloat(distance));
                    $("#distvol").val((distvol).toFixed(2));
                });
            });
        </script>
        </div>
        <div class="mb-3">
          <label class="form-label">Production Factor</label>
          <select  name="factor"class="form-select

          @error('factor')

            is-invalid

          @enderror" placeholder="Input Factor" value="{{ old('factor') ?? $ritasi->factor }}">

          @error('factor')

          <span class="invalid-feedback">{{ $message }}</span>

          @enderror

              <option value="">-- Production Factor --</option>
              @foreach ($problem as $problem)
                 <option value="{{ $problem}}">{{ $problem->prodproblem }}</option>
              @endforeach
           </select>
          </div>

        <div class="mb-3">
          <label class="form-label">Detail Productivity </label>
          <input type="text" name="detail"class="form-control
          @error('detail')

            is-invalid

          @enderror" name="example-text-input" placeholder="Input Detail" value="{{ old('detail') ?? $ritasi->detail }}">
          @error('detail')

          <span class="invalid-feedback">{{ $message }}</span>

          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Dumping</label>
          <input type="text" name="dumping"class="form-control

          @error('dumping')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Dumping" value="{{ old('dumping') ?? $ritasi-> dumping}}">
        @error('dumping')

          <span class="invalid-feedback">{{ $message }}</span>

          @enderror
        </div>

      </div>
      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        <a href="{{ route('ritasi.index') }}" class="btn btn-link" data-bs-dismiss="modal">
          Cancel
        </a>
      </div>

   </form>
</div>
</div>

@endsection
