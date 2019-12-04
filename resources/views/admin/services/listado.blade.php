@extends('admin.services.index')

@section('content_services')
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
                                <th>@sortablelink('name', 'Nombre', ['page' => $services->currentPage()])</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                            <tr>
                                <td>{{$service->name}}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('admin.servicios.edit', [$service->id]) }}"
                                        data-toggle="tooltip" data-placement="top" data-title="Editar">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-danger user_destroy"
                                        href="{{ route('admin.servicios.edit', [$service->id]) }}" data-toggle="tooltip"
                                        data-placement="top" data-title="{{ __('views.admin.users.index.edit') }}">
                                        <i class="fa fa-trash"></i>
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