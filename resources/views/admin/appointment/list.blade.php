@extends('admin.appointment.index')

@section('content_appointment')
<div class="row">
    <h1 class="text-center">Citas pendientes</h1>
</div>
<div class="row">
    {{Form::open(['route'=>['admin.appointment.search'], 'method'=> 'post'])}}
    @csrf
    <div class="col-md-11">
        @if(isset($filter))
        <input type="text" name="parameter" id="filter_input" value="{{$filter}}" class="form-control" placeholder="Buscar...">
        @else
        <input type="text" name="parameter" id="filter_input" class="form-control" placeholder="Buscar...">
        @endif
    </div>
    <div class="col-md-1">
        <button class="btn btn-success" type="submit" id='btn_filter'>
            <i class="fa fa-search"></i>
        </button>
    </div>
    {{Form::close()}}
</div>
<div class="row">
    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Paciente</th>
                <th>DUI</th>
                <th>Día de la cita</th>
                <th>Hora de la cita</th>
                <th>Razón</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $appoint)
            <tr>
                <td>{{$appoint->patient->name}} {{$appoint->patient->apellido}}</td>
                <td>{{$appoint->patient->dui}}</td>
                <td>{{$appoint->day}}</td>
                <td>{{$appoint->hour}}</td>
                <td>{{$appoint->reason}}</td>
                <td>
                    <a href="{{route('admin.appointment.edit', [$appoint->id])}}" class="btn btn-xs btn-primary">
                        <i class="fa fa-pencil"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection