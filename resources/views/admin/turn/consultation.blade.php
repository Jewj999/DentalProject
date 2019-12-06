@extends('admin.turn.index')

@section('content_turn')
<div class="row">
    <h1 class="text-center">Consultas</h1>
</div>
<div class="row">
    <table class="table table-striped table-bordered dt-responsive nowrap">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DUI</th>
                <th>Edad</th>
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
                <td>
                    <a href="{{route('admin.consultation.pdf', [$consultation->id])}}" class='btn btn-xs btn-primary'>
                        <i class="fa fa-file"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection