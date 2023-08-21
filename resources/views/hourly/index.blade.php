@extends('templating.default')



@php
    $title ="Hourly Production";
    $preTitle ="";
@endphp

@section('isi')
<div class="card">
    <div class="card-body">
        {{--  @if(isset($formattedLastUpdated))
        <p>Last updated: {{ $formattedLastUpdated }}</p>
    @endif

    <form method="POST" action="{{ route('hourly.refresh') }}">
        @csrf
        <label for="date">Enter Date:</label>
        <input type="date" id="date" name="date">
        <button type="submit">Refresh Data</button>
    </form>  --}}
    @if(isset($formattedLastUpdated))
        <p>Last updated: {{ $formattedLastUpdated }}</p>
    @endif

    <form>
        <label for="date">Select Date:</label>
        <select name="date" id="date">
            <option value="">All Dates</option>
            @foreach($availableDates as $date)
                <option value="{{ $date }}" @if($selectedDate == $date) selected @endif>{{ $date }}</option>
            @endforeach
        </select>

        <label for="codeloader">Select Code Loader:</label>
        <select name="codeloader" id="codeloader">
            <option value="">All Code Loaders</option>
            @foreach($availableCodeLoaders as $codeloader)
                <option value="{{ $codeloader }}" @if($selectedCodeLoader == $codeloader) selected @endif>{{ $codeloader }}</option>
            @endforeach
        </select>

        <label for="sitecode">Select Site Code:</label>
        <select name="sitecode" id="sitecode">
            <option value="">All Site Codes</option>
            @foreach($availableSiteCodes as $sitecode)
                <option value="{{ $sitecode }}" @if($selectedSiteCode == $sitecode) selected @endif>{{ $sitecode }}</option>
            @endforeach
        </select>

        <label for="material">Select Material:</label>
        <select name="material" id="material">
            <option value="">All Materials</option>
            @foreach($availableMaterials as $material)
                <option value="{{ $material }}" @if($selectedMaterial == $material) selected @endif>{{ $material }}</option>
            @endforeach
        </select>

        <button type="submit">Filter</button>
    </form>
    <table id="plan-loader-table" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th>Code Unit</th>
                <th>Target /Perjam</th>

            </tr>
        </thead>
        <tbody>
            @foreach($planloaderData as $planloader)
            <tr>
                <td>{{ $planloader->codemodelloader }}</td>
                <td>{{ $planloader->prod_loaderob }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <table id="plan-loader-table" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th>Code Unit</th>
                <th>Target /Perjam</th>

            </tr>
        </thead>
        <tbody>
            @foreach($planhaulerData as $planhauler)
            <tr>
                <td>{{ $planhauler->codemodelhauler }}</td>
                <td>{{ $planhauler->prod_haulerob }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
            <table id="data-table-default" class="table table-striped table-bordered align-middle" >
                <thead>

                    <tr>
                        <th>Date</th>
                        <th>Site Code</th>
                        <th>Time</th>
                        <th>Material</th>
                        <th>Code Loader</th>
                        <th>Total Production</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($hourly as $data)
                    <tr>
                        <td>{{ $data->date }}</td>
                        <td>{{ $data->sitecode }}</td>
                        <td>{{ $data->time }}</td>
                        <td>{{ $data->submaterial }}</td>
                        <td>{{ $data->codeloader }}</td>
                        <td>{{ $data->total_adjustment }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <script>
                // Event listener untuk memperbarui data saat pengguna memilih tanggal
                document.getElementById("date").addEventListener("change", function() {
                    var selectedDate = this.value;
                    // Redirect ke halaman yang sama dengan tanggal yang dipilih
                    window.location.href = "{{ route('hourly.index') }}" + "?date=" + selectedDate;
                });

            </script>
@endsection
