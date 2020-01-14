@extends('admin.logs.index')

@section('content_logs')
<div class="row">
    <div class="x_content">
        <div class="col-md-12 col-sm-12">
            <div class="row">
                {{Form::open(['route'=>['admin.logs.search'], 'method'=> 'post'])}}

                <div class="col-md-11">
                    <input type="text" name="parameter" id="filter_input" class="form-control" placeholder="Buscar...">
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
                                <th>Usuario</th>
                                <th>IP</th>
                                <th>Hora de inicio</th>
                                <th>Accion</th>
                                <th>Hora de actualizacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $log)
                            <tr>
                                <td>{{$log->user->name}}</td>
                                <td>{{$log->ip}}</td>
                                <td>{{$log->created_at}}</td>
                                <td>{{$log->action}}</td>
                                <td>{{$log->updated_at}}</td>
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
