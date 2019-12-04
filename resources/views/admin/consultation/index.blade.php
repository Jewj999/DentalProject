@extends('admin.layouts.admin')

@section('title', 'Consulta')

@section('content')
<div class="row">
    <div class="x_content">
    </div>
</div>
@if($consultation == null)
Reload
@else
<form action="" method='POST'>
    <div class="row">
        <div class="col-md-2">
            <div class="row">
                <div class="col-sm-12">
                    <fieldset>
                        <legend>Servicios:</legend>
                        <div class="row">
                            @foreach($services as $service)
                            <div class="col-sm-12 form-group">
                                <label>
                                    <input type="checkbox" name="service" value="{{$service->id}}">{{$service->name}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="col-md-10 text-center">
            <div class="row">
                <div class="col-md-6">
                    @foreach($tooth as $i => $teeth)
                    @if($i < 32) <div class="col-16 text-center" onclick="clickTeeth({{$teeth->id}})">
                        <label>{{$teeth->name}}</label><br>
                        <img src="{{asset('assets/' . $teeth->img)}}" alt="{{$teeth->name}}">
                </div>
                @if((($i+1) % 8) == 0)
            </div>
            <div class="col-md-6">
                @endif
                @endif
                @endforeach
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @foreach($tooth as $i => $teeth)
                @if($i > 31)
                <div class="col-10 text-center" onclick="clickTeeth({{$teeth->id}})">
                    <label>{{$teeth->name}}</label><br>
                    <img src="{{asset('assets/' . $teeth->img)}}" alt="{{$teeth->name}}">
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-lg btn-primary">Terminar</button>
    </div>
    </div>
    </div>
</form>
@endif

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Trabajo en el diente</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="myInput">
                <div class="row">
                    @foreach($jobs as $job)
                    <div class="col-sm-6 bo">
                        <h2><input type="checkbox" name="job" value="{{$job->id}}"> {{$job->name}}</h2>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="saveJob()">Guardar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
{{Html::script('assets/jquery.js')}}
{{Html::script('assets/bootstrap.min.js')}}
{{Html::script('assets/teeth.js')}}
{{Html::script('assets/tooth.js')}}
@endsection

@section('styles')
@parent
{{ Html::style('assets/teeth.css') }}
@endsection