@extends('../layout/app')

@section('contentheader')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ count($alternatif) }}</h3>
                    <p>Alternatif</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('alternatif.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ count($kriteria) }}</h3>
                    <p>Kriteria</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('kriteria.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $best }}</h3>
                    <p>Alternatif Terbaik</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>

    <!-- Main row -->
    <div class="row">
        <section class="col-lg-12 connectedSortable">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Grafik Hasil Perhitungan Topsis
                    </h3>
                </div>

                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="chart tab-pane active" id="chart" style="position: relative; height: 300px;">
                            @if($status == true)
                            <canvas id="chart-canvas" height="300" style="height: 300px;">
                            </canvas>                         
                            @else
                            <div class="badge badge-danger"><h3>Data Belum Lengkap!</h3></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('js')
<script>
    var l = [
        @foreach($alternatif as $a)
            "{{ $a->nama }}",
        @endforeach
    ];
    var d = [
        @foreach($v as $a)
            {{ $a }},
        @endforeach
    ]
    var barChartCanvas = $('#chart-canvas').get(0).getContext('2d');
    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
        type: 'bar', 
        data: {
            labels: l,
            datasets: [{
                label: 'Prioritas',
                data: d,
                backgroundColor: "#dc3545",
                borderWidth: 1
            }]
        },
        options: barChartOptions
    })
</script>
@endsection