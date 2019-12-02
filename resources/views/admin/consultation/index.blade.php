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
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    @foreach($tooth as $i => $teeth)
                        @if($i < 32)
                            <div class="col-16 text-center">
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
                            <div class="col-10 text-center">
                                <label>{{$teeth->name}}</label><br>
                                <img src="{{asset('assets/' . $teeth->img)}}" alt="{{$teeth->name}}">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</form>
@endif
@endsection


@section('styles')
@parent
{{ Html::style('assets/teeth.css') }}
@endsection