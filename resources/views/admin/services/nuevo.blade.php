@extends('admin.services.index')

@section('content_services')
<div class="row">
    <div class="x_content">
        <br>
        <div class="col-md-12 col-sm-12">
            <div class="row">
                <div class="x_content">
                    @if ($errors->any())
                    <h3>{{$errors}}</h3>
                    @endif
                    {{Form::open(['route' => ['admin.servicios.create'], 'method' => 'post', 'class' => 'form-horizontal'])}}
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-5">
                            <div class="form-group col-md-12">
                                <label for="nameField">Nombre</label>
                                <input type="text" class="form-control" id="nameField" name="nameField"
                                    placeholder="Limpieza dental">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group col-md-12">
                                <label for="nameField">Precio</label>
                                <input type="text" class="form-control" id="nameField" name="priceField"
                                    placeholder="19.99">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </div>
                    {{ Form::close() }}
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