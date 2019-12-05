@extends('admin.turn.index')

@section('content_turn')
<div class="row">
    <h1 class="text-center">Citas de hoy</h1>
</div>
<div class="row">
    <table class="table table-striped table-bordered dt-responsive nowrap">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DUI</th>
                <th>Razón</th>
                <th>Hora</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $point)
            <tr>
                <td>{{$point->patient->name}}</td>
                <td>{{$point->patient->apellido}}</td>
                <td>{{$point->patient->dui}}</td>
                <td>{{$point->reason}}</td>
                <td>{{$point->hour}}</td>
                <td>
                    <a href="{{route('admin.turn.next.appointment', [$point->id])}}" class="btn btn-xs btn-primary">
                        <i class="fa fa-calendar"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection