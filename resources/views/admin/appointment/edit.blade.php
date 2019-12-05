@extends('admin.appointment.index')

@section('content_appointment')
@if(count($errors->all()) != 0)
<div class="row">
    <div class="col-sm-12 alert alert-danger">
        <h4 class="alert-heading">Errores</h4>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
<div class="row">
    <div class="col-md-6">
        <table class='table table-striped'>
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" colspan="2">PACIENTE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Nombre:</th>
                    <td>{{$appointment->patient->name}}</td>
                </tr>
                <tr>
                    <th>Apellido:</th>
                    <td>{{$appointment->patient->apellido}}</td>
                </tr>
                <tr>
                    <th>DUI:</th>
                    <td>{{$appointment->patient->dui}}</td>
                </tr>
                <tr>
                    <th>Sexo:</th>
                    <td>{{$appointment->patient->sex->name}}</td>
                </tr>
                <tr>
                    <th>Edad:</th>
                    <td>{{$appointment->patient->age}} años</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <div class="row">
            {{Form::open(['route'=>['admin.appointment.update'], 'method'=> 'post'])}}
            <input type="hidden" name="appointment_id" value="{{$appointment->id}}">
            <div class="form-group col-md-6">
                <label for="day">Dia de la cita:</label>
                <input type="date" value="{{$appointment->day}}" min="{{date('Y-m-d')}}" name='day' class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="hour">Hora (Formato 24 horas):</label>
                <input type="time" value="{{$appointment->hour}}" name="hour" class='form-control'>
            </div>
            <div class="form-group">
                <label for="reason">Motivo de la cita:</label>
                <textarea class="form-control" placeholder='...' name="reason" rows="3" style="resize: none;">{{$appointment->reason}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary float-right">Guardar</button>
            <a href="{{route('admin.appointment.list')}}" class="btn btn-danger float-right">Cancelar</a>
            {{Form::close()}}
        </div>
    </div>
</div>
@endsection