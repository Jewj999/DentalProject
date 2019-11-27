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
                    <td>{{$patient->name}}</td>
                </tr>
                <tr>
                    <th>Apellido:</th>
                    <td>{{$patient->apellido}}</td>
                </tr>
                <tr>
                    <th>DUI:</th>
                    <td>{{$patient->dui}}</td>
                </tr>
                <tr>
                    <th>Sexo:</th>
                    <td>{{$patient->sex->name}}</td>
                </tr>
                <tr>
                    <th>Edad:</th>
                    <td>{{$patient->age}} años</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <div class="row">
            {{Form::open(['route'=>['admin.appointment'], 'method'=> 'post'])}}
            <input type="hidden" name="patient_id" value="{{$patient->id}}">
            <div class="form-group col-md-6">
                <label for="day">Dia de la cita:</label>
                <input type="date" value="{{old('day')}}" min="{{date('Y-m-d')}}" name='day' class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="hour">Hora:</label>
                <input type="time" value="{{old('hour')}}" name="hour" class='form-control'>
            </div>
            <div class="form-group">
                <label for="reason">Motivo de la cita:</label>
                <textarea value="{{old('reason')}}" class="form-control" placeholder='...' name="reason" rows="3" style="resize: none;"></textarea>
            </div>
            <button type="submit" class="btn btn-primary float-right">Guardar</button>
            <a href="{{route('admin.pacientes.list')}}" class="btn btn-danger float-right">Cancelar</a>
            {{Form::close()}}
        </div>
    </div>
</div>
@endsection