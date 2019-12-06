@extends('admin.layouts.admin')

@section('content')
<!-- page content -->
<!-- top tiles -->
<div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-users"></i> Pacientes</span>
        <div class="count green">{{$counts['patients'] }}</div>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-calendar"></i> Citas del dia</span>
        <div>
            <span class="count green">{{  $counts['dates_today'] }}</span>
        </div>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-check"></i> Consultas del dia </span>
        <div>
            <span class="count green">{{$counts['appointments']}}</span>
        </div>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o "></i> En espera </span>
        <div>
            <span class="count red">{{$counts['waiting']}}</span>
        </div>
    </div>

</div>
<!-- /top tiles -->

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <canvas id="myChart" width="300" height="100"></canvas>
    </div>
</div>
<br />


@endsection

@section('scripts')
@parent
{{ Html::script(mix('assets/admin/js/dashboard.js')) }}
<script>
    let ctx = $('#myChart');
    let data = @json($counts['graphData']);
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: data['labels'],
        datasets: [{
            label: 'Consultas',
            backgroundColor: '#0083C7',
            borderColor: '#0083C7',
            data: data['counts']
        }]
    },
    options: {}
});
</script>
@endsection

@section('styles')
@parent
{{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection