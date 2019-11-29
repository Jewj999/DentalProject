@extends('admin.turn.index')

@section('content_turn')
<div class="row">
    <h1 class="text-center">Lista de pacientes</h1>
</div>
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
                                <th>Nombre</th>
                                <th>Apellido</th>
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
                                    <a href="{{route('admin.turn.next', [$patient->id])}}" class="btn btn-xs btn-primary">
                                        <i class='fa fa-arrow-right'></i>
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