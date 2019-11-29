@extends('admin.turn.index')

@section('content_turn')
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
                <input type="checkbox" value="true" disabled>
            </td>
            @else
            <td>
                <input type="checkbox" value="false" disabled>
            </td>
            @endif
            <td>
                <a href="{{route('admin.consultation', [$turn->id])}}" class='btn btn-xs btn-primary'>
                    <i class="fa fa-arrow-right"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection