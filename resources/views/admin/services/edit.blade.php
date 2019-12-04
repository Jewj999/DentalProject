@extends('admin.layouts.admin')

@section('title',"Editando: " . $service->name)
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <br>
        {{Form::open(['route' => ['admin.servicios.update', $service->id], 'method' => 'put', 'class' => 'form-horizontal form-label-left'])}}
        @csrf
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="form-group col-md-12">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Limpieza dental" value="{{ $service->name }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection

@section('styles')
@parent
@endsection

@section('scripts')
@parent
@endsection