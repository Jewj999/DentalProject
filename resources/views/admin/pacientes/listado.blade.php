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

                    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>@sortablelink('name', 'Nombre', ['page' => $patients->currentPage()])</th>
                                <th>@sortablelink('apellido', 'Apellido', ['page' => $patients->currentPage()])</th>
                                <th>DUI</th>
                                <th>Telefono</th>
                                <th>Genero</th>
                                <th>Acciones</th>
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
                                    <a class="btn btn-xs btn-primary"
                                       href="{{ route('admin.pacientes.show', [$patient->id]) }}" data-toggle="tooltip"
                                       data-placement="top" data-title="Expediente">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-xs btn-info"
                                       href="{{ route('admin.users.edit', [$patient->id]) }}" data-toggle="tooltip"
                                       data-placement="top" data-title="Editar">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-xs btn-danger user_destroy"
                                       href="{{ route('admin.users.edit', [$patient->id]) }}" data-toggle="tooltip"
                                       data-placement="top" data-title="{{ __('views.admin.users.index.edit') }}">
                                        <i class="fa fa-trash"></i>
                                    </a>
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
