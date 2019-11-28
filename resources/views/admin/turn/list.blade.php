@extends('admin.turn.index')

@section('content_turn')
<table class="table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>DUI</th>
            <th>Sexo</th>
            <th>Cita</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        @foreach($turns as $turn)
        <tr>
            <td>{{$turn->patient->name}}</td>
            <td>{{$turn->patient->apellido}}</td>
            <td>{{$turn->patient->dui}}</td>
            <td>{{$turn->patient->sex->name}}</td>
            @if($turn->appointment != null)
            <td>
                <input type="checkbox" value="true" readonly>
            </td>
            @else
            <td>
                <input type="checkbox" value="false" readonly>
            </td>
            @endif
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection