@extends('admin.layouts.admin')

@section('title',"Editando a: " . $patient->apellido . ", " . $patient->name) )
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <br>
        {{ Form::open(['route'=>['admin.pacientes.update', $patient->id],'method' => 'put','class'=>'form-horizontal form-label-left']) }}
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                Nombre
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" type="text"
                    class="form-control col-md-7 col-xs-12 @if($errors->has('name')) parsley-error @endif" name="name"
                    id="name" value="{{ $patient->name }}" required>
                @if($errors->has('name'))
                <ul class="parsley-errors-list filled">
                    @foreach($errors->get('name') as $error)
                    <li class="parsley-required">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">
                Apellidos
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="apellido" type="apellido"
                    class="form-control col-md-7 col-xs-12 @if($errors->has('apellido')) parsley-error @endif"
                    name="apellido" value="{{ $patient->apellido }}" required>
                @if($errors->has('apellido'))
                <ul class="parsley-errors-list filled">
                    @foreach($errors->get('apellido') as $error)
                    <li class="parsley-required">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="born">
                Fecha de nacimiento
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="born" type="date"
                    class="form-control col-md-7 col-xs-12 @if($errors->has('born')) parsley-error @endif" name="born"
                    value="{{ $patient->born }}">
                @if($errors->has('born'))
                <ul class="parsley-errors-list filled">
                    @foreach($errors->get('born') as $error)
                    <li class="parsley-required">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">
                Telefono
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="phone" type="phone"
                    class="form-control col-md-7 col-xs-12 @if($errors->has('phone')) parsley-error @endif" name="phone"
                    value="{{ $patient->phone }}" required>
                @if($errors->has('phone'))
                <ul class="parsley-errors-list filled">
                    @foreach($errors->get('phone') as $error)
                    <li class="parsley-required">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dui">
                DUI
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="dui" type="dui"
                    class="form-control col-md-7 col-xs-12 @if($errors->has('dui')) parsley-error @endif" name="dui"
                    value="{{ $patient->dui }}" required>
                @if($errors->has('dui'))
                <ul class="parsley-errors-list filled">
                    @foreach($errors->get('dui') as $error)
                    <li class="parsley-required">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direction">
                Direccion
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="direction" type="direction"
                    class="form-control col-md-7 col-xs-12 @if($errors->has('direction')) parsley-error @endif"
                    name="direction" value="{{ $patient->direction }}" required>
                @if($errors->has('direction'))
                <ul class="parsley-errors-list filled">
                    @foreach($errors->get('direction') as $error)
                    <li class="parsley-required">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <a class="btn btn-primary" href="{{ URL::previous() }}">
                    Cancelar</a>
                <button type="submit" class="btn btn-success">Editar</button>
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
<script>
    $('#name, #apellido').keypress(function(e){
   
        if(!(($(this).val() + e.key).match(/^[A-Za-z\s]+$/))){
            e.preventDefault();
        }
    });
    $('#dui, #phone').keypress(function(e){
        if(isNaN(parseInt(e.key))){
            e.preventDefault();
        }
    });
    $('#dui').keypress(function(e){
        if($(this).val().length >= 9){
            e.preventDefault();
        }
    });
    $('#dir').keypress(function(e){
        if($(this).val().length >= 150){
            e.preventDefault();
        }
    });

</script>
@endsection