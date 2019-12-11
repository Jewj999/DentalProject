@extends('admin.services.index')

@section('content_services')
<div class="row">
    <div class="x_content">
        <br>
        <div class="col-md-12 col-sm-12">
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
                <div class="x_content">
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
