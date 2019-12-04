@extends('admin.pacientes.index')

@section('content_paciente')
<div class="row">
    <div class="x_content">
        <br>
        <div class="col-md-12 col-sm-12">
            <div class="row">
                <div class="x_content">
                    {{Form::open(['route' => ['admin.pacientes.create'], 'method' => 'post', 'class' => 'form-horizontal'])}}
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-5">
                            <div class="row">
                                <div class="form-group col-md-12 has-feedback @error('nameField') has-error @enderror">
                                    <label class="control-label" for="nameField">Nombres</label>
                                    <input type="text" class="form-control" id="nameField" name="nameField"
                                        placeholder="Omar Alexander" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 has-feedback @error('bornField') has-error @enderror">
                                    <label class="control-label" for="bornField">Fecha de nacimiento</label>
                                    <input type="date" class="form-control" id="bornField" name="bornField" required>

                                </div>
                                <div class="form-group col-md-6 has-feedback @error('duiField') has-error @enderror">
                                    <label class="control-label" for="duiField">DUI</label>
                                    <input type="text" class="form-control" name="duiField" id="duiField"
                                        placeholder="123456789" required>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 has-feedback @error('dptoField') has-error @enderror">
                                    <label class="control-label" for="bornField">Departamento</label>
                                    <select class="form-control" name="dptoField" id="dptoField" required>
                                        @foreach ($dptos as $dpto)
                                        <option value="{{$dpto->id}}">{{$dpto->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 has-feedback @error('munField') has-error @enderror">
                                    <label class="control-label" for="munField">Municipio</label>
                                    <select class="form-control" name="munField" id="munField" required>
                                        <option value="2" selected>Soyapango</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <div class="row">
                                <div
                                    class="form-group col-md-12 has-feedback @error('lastNameField') has-error @enderror">
                                    <label class="control-label" for="lastNameField">Apellidos</label>
                                    <input type="text" class="form-control" id="lastNameField" name="lastNameField"
                                        placeholder="Lino Cruz" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 has-feedback @error('phoneField') has-error @enderror">
                                    <label class="control-label" for="phoneField">Telefono</label>
                                    <input type="text" class="form-control" id="phoneField" name="phoneField"
                                        placeholder="78871991" required>
                                </div>
                                <div class="form-group col-md-6 has-feedback @error('bornField') has-error @enderror">
                                    <label class="control-label" for="sexField">Genero</label>
                                    <select class="form-control" name="sexField" id="sexField" required>
                                        @foreach ($sexes as $sexe)
                                        <option value="{{$sexe->id}}">{{$sexe->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 has-feedback @error('dirField') has-error @enderror">
                                    <label class="control-label" for="dirField">Direccion</label>
                                    <input class="form-control" type="text" name="dirField" id=""
                                        placeholder="Barrio San Esteban, Poligono 4, Casa #12" required>
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
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script>
    $("#dptoField").change(function() {
        $.ajax({
            type: 'GET',
            url : `/laravel-boilerplate/public/api/${$(this).val()}/municipalities`,
            success : function(res){
                let app = '';
                for(let v of res){
                    app+= `<option value="${v.id}">${v.name}</option>`
                }
                $('#munField').empty().append(app);
            }
        })
    });
</script>
@endsection

@section('styles')
@parent
@endsection