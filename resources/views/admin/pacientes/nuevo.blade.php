@extends('admin.pacientes.index')

@section('content_paciente')
<div class="row">
    <div class="x_content">
        <br>
        <div class="col-md-12 col-sm-12">
            <div class="row">
                <div class="x_content">
                    <form action="{{route('admin.pacientes.create')}}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="row d-flex justify-content-center">
                            <div class="form-group col-md-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="nameField">Nombres</label>
                                        <input type="text" class="form-control" id="nameField" name="nameField"
                                            placeholder="Omar Alexander">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="bornField">Fecha de nacimiento</label>
                                        <input type="date" class="form-control" id="bornField" name="bornField">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="duiField">DUI</label>
                                        <input type="text" class="form-control" name="duiField" id="duiField"
                                            placeholder="123456789">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="bornField">Departamento</label>
                                        <select class="form-control" name="dptoField" id="">
                                            @foreach ($dptos as $dpto)
                                            <option value="{{$dpto->id}}">{{$dpto->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="munField">Municipio</label>
                                        <select class="form-control" name="munField" id="">
                                            <option value="2" selected>Soyapango</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="lastNameField">Apellidos</label>
                                        <input type="text" class="form-control" id="lastNameField" name="lastNameField"
                                            placeholder="Lino Cruz">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="phoneField">Telefono</label>
                                        <input type="text" class="form-control" id="phoneField" name="phoneField"
                                            placeholder="78871991">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="dptoField">Genero</label>
                                        <select class="form-control" name="sexField" id="sexField">
                                            @foreach ($sexes as $sexe)
                                            <option value="{{$sexe->id}}">{{$sexe->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Direccion</label>
                                        <input class="form-control" type="text" name="dirField" id=""
                                            placeholder="Barrio San Esteban, Poligono 4, Casa #12">
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </div>
                    </form>
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