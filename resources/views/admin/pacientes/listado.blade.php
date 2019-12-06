@extends('admin.pacientes.index')

@section('content_paciente')
<div class="row">
    <div class="x_content">
        <div class="col-md-12 col-sm-12">
            <div class="row">
                {{Form::open(['route'=>['admin.paciente.search'], 'method'=> 'post'])}}
                <input type="hidden" name="route" value="1">
                <div class="col-md-11">
                    @if(isset($filter))
                    <input type="text" name="parameter" id="filter_input" value='{{$filter}}' class="form-control"
                        placeholder="Buscar...">
                    @else
                    <input type="text" name="parameter" id="filter_input" class="form-control" placeholder="Buscar...">
                    @endif
                </div>
                <div class="col-md-1">
                    <button class="btn btn-success" type="submit" id='btn_filter'>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                {{Form::close()}}
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
                                <td id="acciones">
                                    <a class="btn btn-primary" href="#" data-toggle="tooltip" data-placement="top"
                                        data-title="Expediente">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-info" href="{{ route('admin.pacientes.edit', [$patient->id]) }}"
                                        data-toggle="tooltip" data-placement="top" data-title="Editar">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-primary"
                                        href="{{route('admin.appointment.create', [$patient->id])}}"
                                        data-toggle="tooltip" data-placement="top" data-title="Citar">
                                        <i class="fa fa-calendar"></i>
                                    </a>
                                    <a class="btn btn-danger user_destroy"
                                        href="{{ route('admin.pacientes.destroy', [$patient->id]) }}"
                                        data-toggle="tooltip" data-placement="top" data-title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="modal fade modal-confirm-delete">

                    </div>
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