@extends('templating.default')
@php
    $preTitle = "";
    $title = "Dashboard"
@endphp
@section('isi')

	<!-- BEGIN daterange-filter -->
    <form action="{{ route('dashboard.index') }}" method="GET">
    <label for="year">Select Year:</label>
    <select name="year" id="year">
        @for ($i = date('Y'); $i >= 2000; $i--)
            <option value="{{ $i }}" {{ $selectedYear == $i ? 'selected' : '' }}>
                {{ $i }}
            </option>
        @endfor
    </select>

    <label for="month">Select Month:</label>
    <select name="month" id="month">
        @for ($i = 1; $i <= 12; $i++)
            <option value="{{ $i }}" {{ $selectedMonth == $i ? 'selected' : '' }}>
                {{ date('F', mktime(0, 0, 0, $i, 1)) }}
            </option>
        @endfor
    </select>

    <label for="date">Select Date:</label>
    <input type="date" name="date" id="date" value="{{ $selectedDate }}">

    <button type="submit">Filter</button>
</form>

	<!-- END daterange-filter -->
    <div class="card">
        <div class="card-body">
            <div class="row">


                <div class="col-md-6">
                    <div  id="combined-chart"></div>
                </div>
                <div class="col-md-6">
                    <div id="planbudget"></div>
                </div>
                <div class="col-md-6">
                    <div id="daily-chart"></div>
                </div>
                <div class="col-md-6">
                    <div id="weather"></div>
               </div>
               <div class="col-md-6">
               <div id="statusChart"></div>
            </div>
            <div class="col-md-6">
                <div id="breakChart"></div>
             </div>
             <div class="col-md-6">
                <div id="fuelChart"></div>
             </div>
             <div class="col-md-6">
                <div id="hourChart"></div>
             </div>
            </div>
        </div>
    </div>
<script src="{{ asset('highcharts/code/highcharts.js') }}"></script>
<script type="text/javascript">
    var adjustData = @json($adjustment);

    Highcharts.chart('daily-chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Daily Production'
        },
        xAxis: {
            categories: adjustData.map(data => data.date),
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
            name: 'Production',
            data: adjustData.map(data => data.adjustment),
            color: 'green',
            dataLabels: {
                enabled: true,
                rotation: 0,
                color: '#666666',
                align: 'center',
                format: '{y}',
                y: -10,
                style: {
                    fontSize: '10px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
</script>
<script src="{{ asset('highcharts/code/highcharts.js') }}"></script>
<script type="text/javascript">
    var plansiteData = @json($plansiteData);
    var adjustData = @json($adjustData);

    function getMonthName(monthNumber) {
        var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        return monthNames[monthNumber - 1];
    }
    adjustData.forEach(data => {
        data.adjustment = -data.adjustment; // Ubah nilai menjadi positif
    });
    Highcharts.chart('combined-chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Plan vs Actual Month'
        },
        xAxis: {
            categories: plansiteData.map(data => getMonthName(data.bulan)),
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
            name: 'Plan',
            data: plansiteData.map(data => data.plan_site),
            color: 'brown',
            dataLabels: {
                enabled: true,
                rotation: 0,
                color: '#666666',
                align: 'center',
                format: '{y}', // Menggunakan {y} untuk menampilkan nilai dari data adjustment
                y: -10,
                style: {
                    fontSize: '10px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }, {
            name: 'Actual ',
            data: adjustData.map(data => -data.adjustment),
            color: 'green',// Ubah nilai menjadi negatif untuk menampilkan bar ke atas
            dataLabels: {
                enabled: true,
                rotation: 0,
                color: '#666666',
                align: 'center',
                format: '{y}', // Menggunakan {y} untuk menampilkan nilai dari data adjustment
                y: -10,
                style: {
                    fontSize: '10px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
</script>

<script src="{{ asset('highcharts/code/highcharts.js') }}"></script>
<script type="text/javascript">

        var produksi = <?php echo json_encode($adjustment) ?>;
        var plansite = <?php echo json_encode($plansite) ?>;
        var planbudget = <?php echo json_encode($planbudget) ?>;

        Highcharts.chart('planbudget', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Plan Budget vs Actual Month'
            },
            xAxis: {
                categories: planbudget.map(data => getMonthName(data.bulan)),
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
                name: 'Plan Budget',
                data: planbudget.map(data => data.plan_budget),
                color: 'orange',
                dataLabels: {
                    enabled: true,
                    rotation: 0,
                    color: '#666666',
                    align: 'center',
                    format: '{y}', // Menggunakan {y} untuk menampilkan nilai dari data adjustment
                    y: -10,
                    style: {
                        fontSize: '10px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }, {
                name: 'Actual ',
                data: adjustData.map(data => -data.adjustment),
                color: 'green',// Ubah nilai menjadi negatif untuk menampilkan bar ke atas
                dataLabels: {
                    enabled: true,
                    rotation: 0,
                    color: '#666666',
                    align: 'center',
                    format: '{y}', // Menggunakan {y} untuk menampilkan nilai dari data adjustment
                    y: -10,
                    style: {
                        fontSize: '10px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });

        function getMonthName(monthNumber) {
            var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            return monthNames[monthNumber - 1];
        }
        function getColorForMonth(monthNumber) {
            // Define a mapping of colors based on month
            var colorMap = {
                1: '#FF5733', // January
                2: '#FFC300', // February
                3: '#4CAF50', // March
                4: '#4CAF50',
                5: '#FFC300',
                6: 'FF5733',
                7: '#008000',
                8: '#4CAF50',
            };

            return colorMap[monthNumber] || '#808080'; // Default to gray if color is not defined
        }
</script>

<script src="{{ asset('highcharts/code/highcharts.js') }}"></script>
<script type="text/javascript">
    var adjustmentData = <?php echo json_encode($adjustment) ?>;

    // Use Laravel Collection to group data by sitecode, date, and codeloader
    var seriesData = [];

    adjustmentData.forEach(function(item) {
        var sitecode = item.sitecode;
        var date = item.date;

        var adjustment = parseFloat(item.adjustment);

        // Find existing data based on sitecode and codeloader
        var existingData = seriesData.find(function(data) {
            return data.sitecode === sitecode ;
        });

        if (existingData) {
            // Find existing data point based on date
            var dataPoint = existingData.data.find(function(data) {
                return data[0] === date;
            });

            if (dataPoint) {
                // If data point exists, add the adjustment value to it
                dataPoint[1] += adjustment;
            } else {
                // If data point doesn't exist, create a new data point
                existingData.data.push([date, adjustment]);
            }
        } else {
            // If sitecode and codeloader combination doesn't exist, create a new data entry
            seriesData.push({
                sitecode: sitecode,

                data: [[date, adjustment]]
            });
        }
    });

    // Highcharts script for the chart
    Highcharts.chart('adjustmentChart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Production'
        },
        xAxis: {
            type: 'category', // Use type 'category' for multiple categories
            labels: {
                rotation: 0, // Rotate labels for better readability
                align: 'center'
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Bcm'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        series: seriesData.map(function(item) {
            return {
                name: item.material ,
                data: item.data
            };
        })
    });
</script>


<script src="{{ asset('highcharts/code/highcharts.js') }}"></script>
<script type="text/javascript">
    var combinedData = @json($combinedData);

    var seriesData = [];
    for (var sitecode in combinedData) {
        var comparisonData = [];

        for (var date in combinedData[sitecode]) {
            var data = combinedData[sitecode][date];
            var rainhour = parseFloat(data.rainhour) || 0;
            var slipperyhour = parseFloat(data.slipperyhour) || 0;
            var planRain = parseFloat(data.plan_rain) || 0;
            var planSlippery = parseFloat(data.plan_slippery) || 0;

            comparisonData.push({
                name: date,
                y: [rainhour, slipperyhour, planRain, planSlippery]
            });
        }

        seriesData.push({
            name: 'Site ' + sitecode + ' - Rainhour',
            data: comparisonData.map(function(item) { return item.y[0]; })
        });

        seriesData.push({
            name: 'Site ' + sitecode + ' - Slipperyhour',
            data: comparisonData.map(function(item) { return item.y[1]; })
        });

        seriesData.push({
            name: 'Site ' + sitecode + ' - Plan Rain',
            data: comparisonData.map(function(item) { return item.y[2]; })
        });

        seriesData.push({
            name: 'Site ' + sitecode + ' - Plan Slippery',
            data: comparisonData.map(function(item) { return item.y[3]; })
        });
    }

    Highcharts.chart('weather', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Weather Comparison'
        },
        xAxis: {
            type: 'category',
            title: {
                text: 'Date'
            }
        },
        yAxis: {
            title: {
                text: 'Hour'
            }
        },
        tooltip: {
            headerFormat: '<b>{point.key}</b><br>',
            pointFormat: '{series.name}: {point.y} hours'
        },
        plotOptions: {
            column: {
                stacking: 'normal'
            }
        },
        series: seriesData
    });
</script>


<script src="{{ asset('highcharts/code/highcharts.js') }}"></script>
<script type="text/javascript">
  // Ambil data dari PHP dan konversi menjadi format yang sesuai untuk Highcharts
var chartData = <?php echo json_encode($statusData); ?>;

// Inisialisasi grafik menggunakan Highcharts
Highcharts.chart('statusChart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Status Unit'
    },
    xAxis: {
        categories: chartData.map(item => item.statusunitdate)
    },
    yAxis: {
        title: {
            text: 'Status Hour'
        }
    },
    series: chartData.map(item => {
        return {
            name: item.statuscnunit,
            data: [item.statushour]
        };
    })
});

</script>

    <script>
        var chartData = {!! json_encode($breakData) !!};

        // Mengelompokkan data berdasarkan breakcnunit
        var groupedData = {};

        chartData.forEach(data => {
            if (!groupedData[data.breakcnunit]) {
                groupedData[data.breakcnunit] = [];
            }

            groupedData[data.breakcnunit].push({
                date: data.breakdate,
                total: data.breaktotal
            });
        });

        var categories = []; // Daftar tanggal untuk sumbu x
        var series = [];

        // Daftar warna yang akan digunakan untuk setiap seri
        var colors = ['#FF5733', '#33FF57', '#5733FF', '#FF33E9', '#33E9FF'];

        var colorIndex = 0;

        for (var unit in groupedData) {
            var unitData = groupedData[unit];
            var unitSeriesData = [];

            unitData.forEach(data => {
                if (!categories.includes(data.date)) {
                    categories.push(data.date);
                }

                unitSeriesData.push(data.total);
            });

            series.push({
                name: unit,
                data: unitSeriesData,
                color: colors[colorIndex] // Menggunakan warna dari daftar warna
            });

            colorIndex = (colorIndex + 1) % colors.length;
        }

        Highcharts.chart('breakChart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Breakdown Unit'
            },
            xAxis: {
                categories: categories,
                labels: {
                    rotation: 0,
                    step: 1
                }
            },
            yAxis: {
                title: {
                    text: 'Total'
                }
            },
            series: series
        });
    </script>
    <script>
        // Sample data from your database query
        var fuelData = <?php echo json_encode($fuelData); ?>;

        // Prepare data for Highcharts
        var categories = [];
        var seriesData = [];

        fuelData.forEach(function(item) {
            categories.push(item.fuelcnunit);
            seriesData.push(parseFloat(item.fueltotal));
        });

        // Initialize the chart
        Highcharts.chart('fuelChart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Fuel Consumption by Unit'
            },
            xAxis: {
                categories: categories,
                title: {
                    text: 'Fuel Units'
                }
            },
            yAxis: {
                title: {
                    text: 'Fuel Total'
                }
            },
            series: [{
                name: 'Fuel Consumption',
                data: seriesData
            }]
        });
    </script>
    <script>
        // Assuming you have passed the PHP $hmData variable to this JavaScript code
        var hmData = <?php echo json_encode($hmData); ?>;

        // Transform the data to a format suitable for Highcharts
        var seriesData = {}; // Object to store data for different 'cnunithm' values
        hmData.forEach(function(item) {
          var date = Date.parse(item.datehm);
          var cnunithm = item.cnunithm;
          var totalhm = parseFloat(item.totalhm);

          if (!seriesData[cnunithm]) {
            seriesData[cnunithm] = {
              name: 'CN Unit ' + cnunithm,
              color: getRandomColor(), // Get a random color for each series
              data: []
            };
          }

          seriesData[cnunithm].data.push([date, totalhm]);
        });

        // Convert the seriesData object into an array of series objects
        var series = [];
        for (var cnunithm in seriesData) {
          series.push(seriesData[cnunithm]);
        }

        // Create the Highcharts chart
        Highcharts.chart('hourChart', {
            chart: {
                type: 'column'
            },
          title: {
            text: 'Hour Meter Data'
          },
          xAxis: {
            type: 'date',
            labels: {
              format: '{value:%Y-%m-%d}'
            }
          },
          yAxis: {
            title: {
              text: 'Total Hour Meter'
            }
          },
          series: series
        });

        // Function to generate a random color
        function getRandomColor() {
          var letters = '0123456789ABCDEF';
          var color = '#';
          for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
          }
          return color;
        }
      </script>
@endsection
