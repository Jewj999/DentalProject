@extends('admin.layouts.admin')

@section('title', 'Reportes')

@section('content')
<div class="row">
    <div class="x_content">
        <div class="row">
            {{Form::open(['route'=>['admin.report.search'], 'method'=> 'post'])}}
            <div class="form-group col-md-5">
                <label for="init">Desde:</label>
                <input type="date" name="init" id="init" class="form-control" value="">
            </div>
            <div class="form-group col-md-5">
                <label for="final">Hasta:</label>
                <input type="date" name="final" id="final" class="form-control">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
            {{Form::close()}}
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="{{url('')}}" target="_blank" class='btn btn-primary' data-toggle="tooltip" data-placement="top"
                    data-title="Reporte General" id="rep">
                    <i class="fa fa-file"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DUI</th>
                <th>Edad</th>
                <th>Fecha de la consulta</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consultations as $consultation)
            <tr>
                <td>{{$consultation->turn->patient->name}}</td>
                <td>{{$consultation->turn->patient->apellido}}</td>
                <td>{{$consultation->turn->patient->dui}}</td>
                <td>{{$consultation->turn->patient->age}}</td>
                <td>{{$consultation->created_at}}</td>
                <td>
                    <a href="{{route('admin.consultation.pdf', [$consultation->id])}}" target="_blank"
                        class='btn btn-xs btn-primary' data-toggle="tooltip" data-placement="top" data-title="PDF">
                        <i class="fa fa-file"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
@parent
<script>
    $(document).ready(function(){
        $('#init, #final').val(new Date().toISOString().substr(0,10));
        $('#rep').attr('href', `{{url("admin/report/pdf")}}?init=${$('#init').val()}&final=${$('#final').val()}`);
    });

    $('#init, #final').change(function(){
        $('#rep').attr('href', `{{url("admin/report/pdf")}}?init=${$('#init').val()}&final=${$('#final').val()}`);
    });
</script>
@endsection