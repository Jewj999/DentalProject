@extends('admin.pacientes.index')

@section('content_paciente')
<div class="row">
    <div class="x_content">
        <div class="col-md-12 col-sm-12">
            <div class="row">
                <div class="col-md-11">
                    <input type="text" name="filter" id="filter_input" class="form-control" placeholder="Buscar...">
                </div>
                <div class="col-md-1">
                    <button class="btn btn-success" type="button" id='btn_filter'>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="x_content">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Apellido</td>
                                <td>DUI</td>
                                <td>Phone</td>
                                <td>Sexo</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                            <tr>
                                <td>{{$patient->name}}</td>
                                <td>{{$patient->apellido}}</td>
                                <td>{{$patient->dui}}</td>
                                <td>{{$patient->phone}}</td>
                                <td>{{$patient->sex->name}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('admin.appointment.create', [$patient->id])}}">
                                        <i class="fa fa-calendar"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent

@endsection

@section('styles')
@parent
@endsection