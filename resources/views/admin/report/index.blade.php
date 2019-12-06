@extends('admin.layouts.admin')

@section('title', 'Reportes')

@section('content')
<div class="row">
    <div class="x_content">
        <div class="row">
            {{Form::open(['route'=>['admin.report.search'], 'method'=> 'post'])}}
            <div class="form-group col-md-5">
                <label for="init">Inicio:</label>
                <input type="date" name="init" id="init" class="form-control" value="">
            </div>
            <div class="form-group col-md-5">
                <label for="final">Fin:</label>
                <input type="date" name="final" id="final" class="form-control">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
            {{Form::close()}}
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
                    <a href="" class="btn btn-xs btn-primary">
                        <i class="fa fa-archive"></i>
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
    });
</script>
@endsection