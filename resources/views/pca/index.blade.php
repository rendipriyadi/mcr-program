@extends('templating.default')



@php
    $title ="Production Capacity Analysis ";
    $preTitle ="PCA";
@endphp
@section('isi')
<div class="card">
    <div class="card-body">
        <div id="pca"></div>
<script src="{{ asset('highcharts/code/highcharts.js') }}"></script>
<script type="text/javascript">
            var achievementData = @json($plansite);
            var adjustData = @json($adjustment);

            // Fungsi untuk mengonversi tanggal menjadi format yang diinginkan (misalnya: 2023-08-01)
            function formatDate(date) {
                var year = date.getFullYear();
                var month = ('0' + (date.getMonth() + 1)).slice(-2);
                var day = ('0' + date.getDate()).slice(-2);
                return year + '-' + month + '-' + day;
            }

            // Mengubah nilai adjustment menjadi positif
            adjustData.forEach(data => {
                data.adjustment = -data.adjustment; // Ubah nilai menjadi positif
            });

            Highcharts.chart('pca', {
                chart: {
                    type: 'column' // Menggunakan jenis chart kolom
                },
                title: {
                    text: 'Achievement and Adjustment'
                },
                xAxis: {
                    categories: achievementData.map(data => formatDate(new Date(data.tanggal))),
                    labels: {
                        rotation: 0,
                        style: {
                            fontSize: '12px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    title: {
                        text: 'Thousand'
                    },
                    labels: {
                        formatter: function() {
                            return Highcharts.numberFormat(this.value, 0, '.', ',');
                        }
                    }
                },
                legend: {
                    enabled: true
                },
                tooltip: {
                    shared: true
                },
                series: [{
                    name: 'Achievement',
                    data: achievementData.map(data => data.achievement),
                    color: 'green' // Ganti warna untuk seri Achievement menjadi biru
                }, {
                    name: 'Positive Adjustment',
                    data: adjustData.map(data => data.adjustment),
                    color: 'orange' // Ganti warna untuk seri Positive Adjustment menjadi hijau
                }]
            });
</script>
</div>

@endsection
