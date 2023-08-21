@extends('templating.default')

@php
    $title ="Create Equipment";
    $preTitle ="";
@endphp

@section('isi')

<div class="card">

<div class="card-body">
   <form action="{{ route('equipment.store') }}" class="" method="post">
    @csrf
    <div class="mb-3">
      <label class="form-label">Site</label>
      <select class="form-control  @error('sitecode')

      is-invalid

    @enderror" name="sitecode" value="{{ old('sitecode') }}">
    @error('sitecode')

    <span class="invalid-feedback">{{ $message }}</span>

    @enderror
        <option value="">---Site---</option>
        @foreach ($site as $sitecode)
           <option value="{{ $sitecode}}">{{ $sitecode->sitecode }}</option>
        @endforeach
     </select>

    </div>

      <div class="mb-3">
        <label class="form-label">Model Code</label>
        <input type="text" name="modelunit"class="form-control
        @error('modelunit')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Model Code" value="{{ old('modelunit') }}">
        @error('modelunit')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
        </input>
      </div>
      <div class="mb-3">
        <label class="form-label">Code Unit</label>
        <input type="text" name="codeunit"class="form-control
        @error('codeunit')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Model Code" value="{{ old('codeunit') }}">
        @error('codeunit')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
        </input>
      </div>
      <div class="mb-3">
        <label class="form-label">Type Code</label>
        <input type="text" name="type"class="form-control

        @error('type')

        is-invalid

      @enderror" name="example-text-input" placeholder="Input Type Code" value="{{ old('type') }}">
      @error('type')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Category Code</label>
        <input type="text" name="category"class="form-control

        @error('category')

          is-invalid

        @enderror" name="example-text-input" placeholder="Input Category Code" value="{{ old('category') }}">
        @error('category')

        <span class="invalid-feedback">{{ $message }}</span>

        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Fungsi Equipment</label>
    <select name="fungsi_equip" class="form-control" required>
        <option value="">---Select Fungsi---</option>
        <option value="loader">Loader</option>
        <option value="hauler">Hauler</option>
        <option value="support">Support</option>
    </select>
    </div>
      <div class="mb-3">
        <label class="form-label">Activity</label>
        <select name="status" class="form-control" required>
            <option value="">---Select Status---</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
      </div>
      @foreach(['hauler'] as $equipment)
      <div class="mb-3 equipment-type" data-type="{{ $equipment }}" style="display: none;">
          <label class="form-label">Truck Factor for {{ ucfirst($equipment) }}</label>
          <div class="mb-3">

            <input type="text" name="truck_factor"class="form-control

            @error('truck_factor')

            is-invalid

          @enderror" name="example-text-input" placeholder="Input Truck Factor" value="{{ old('truck_factor') }}">
          @error('truck_factor')

            <span class="invalid-feedback">{{ $message }}</span>

            @enderror
          </div>
          <script>
            const typeSelect = document.querySelector('select[name="fungsi_equip"]');
            const equipmentTypeDivs = document.querySelectorAll('.equipment-type');

            typeSelect.addEventListener('change', function() {
                const selectedType = this.value;
                equipmentTypeDivs.forEach(div => {
                    if (div.getAttribute('data-type') === selectedType) {
                        div.style.display = 'block';
                    } else {
                        div.style.display = 'none';
                    }
                });

                // Set the selected type as the value of the hidden input "fungsi_equip"
                document.querySelector('input[name="fungsi_equip"]').value = selectedType;
            });
        </script>
      </div>
  @endforeach

      <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        {{--  <a href="{{ route('equipment.index') }}" class="btn btn-danger" data-bs-dismiss="modal">
          Cancel
        </a>  --}}
      </div>
   </form>
</div>
</div>


@endsection
