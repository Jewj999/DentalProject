@extends('admin.appointment.index')

@section('content_appointment')
<div class="row">
    <h1 class="text-center">Citas pendientes</h1>
</div>
<div class="row">
    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Paciente</th>
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
