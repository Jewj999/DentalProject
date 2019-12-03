@extends('admin.audits.index')

@section('content_audit')
<div class="row">
    <h1 class="text-center">Auditorias</h1>
</div>
<div class="row">
    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Día</th>
                <th>Hora</th>
                <th>Razón</th>
                <th>Estado</th>
                <th>Fecha de la cita</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $appoint)
            <tr>
                <td>{{$appoint->patient->name}} {{$appoint->patient->apellido}}</td>
                <td>{{$appoint->day}}</td>
                <td>{{$appoint->hour}}</td>
                <td>{{$appoint->reason}}</td>
                <td>{{$appoint->status->name}}</td>
                <td>{{$appoint->created_at}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
