@extends('admin.layouts.admin')

@section('title', 'Consulta')

@section('content')
<div class="row">
    <div class="x_content">
    </div>
</div>
@if($consultation == null)
    <div class="row">
        <div class="col-sm-12 text-center">
        <img src="{{asset('/assets/reload.png')}}" alt="Cuando entre el paciente recarge la pagina">
        </div>
    </div>
@else
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
{{Form::open(['route'=>['admin.consultation.update'], 'method'=> 'post'])}}
@csrf
<input type="hidden" id='consultation' name='consultation' value="{{$consultation->id}}">
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
                                {{Form::checkbox('service[]', $service->id)}}
                                {{$service->name}}
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
                @if($i < 32) <div class="col-16 text-center" onclick="clickTeeth({{$teeth->id}}, {{$teeth->name}})">
                    @if($teeth->job)
                    <label id="{{$teeth->id}}" style='color: red;'>{{$teeth->name}}</label>
                    @else
                    <label id="{{$teeth->id}}">{{$teeth->name}}</label>
                    @endif
                    <br>
                    <img src="{{asset('assets/' . $teeth->img)}}" alt="{{$teeth->name}}">
            </div>
            @if((($i+1) % 8) == 0)
        </div>
        <div class="col-md-6">
            @endif
            @endif
            @endforeach
        </div>
        <br>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @foreach($tooth as $i => $teeth)
            @if($i > 31)
            <div class="col-10 text-center" onclick="clickTeeth({{$teeth->id}}, {{$teeth->name}})">
                @if($teeth->job)
                <label id="{{$teeth->id}}" style='color: red;'>{{$teeth->name}}</label>
                @else
                <label id="{{$teeth->id}}">{{$teeth->name}}</label>
                @endif
                <br>
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
{{Form::close()}}
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
<script>
    $(document).ready(function() {
        $('#myModal').on('hidden.bs.modal', function() {
            // Clean checked
            $.each($('input[name="job"]'), function() {
                $(this).prop('checked', false);
            });
        });
    });

    function clickTeeth(id, name) {
        $('#myModal').modal('show');
        $('#myInput').val(id);
        var consultation = $('#consultation').val();
        $('#myModalLabel').text('Diente ' + name);
        $.ajax({
            type: 'GET',
            url: "{{url('/api/detail')}}" + '/' + consultation + '/' + id,
            success: function(data) {
                data.blob.forEach(function(job) {
                    $.each($('input[name="job"]'), function() {
                        if ($(this).val() == job.job_id) {
                            $(this).prop('checked', true);
                        }
                    });
                });
            },
            error: function(data) {
                console.log(data.message);
            }
        })
    }

    function saveJob() {
        var jobs = [];
        var consultation = $('#consultation').val();
        var teeth = $('#myInput').val();
        $.each($('input[name="job"]:checked'), function() {
            jobs.push($(this).val());
        });
        $.ajax({
            type: 'POST',
            url: "{{url('/api/job')}}",
            contentType: 'application/json',
            data: JSON.stringify({
                teeth: teeth,
                consultation: consultation,
                jobs: jobs
            }),
            success: function(data) {
                // Close modal
                $('#myModal').modal('hide');
                let id = '#' + teeth;
                if (data.blob > 0) {
                    $(id).css('color', 'red');
                } else {
                    $(id).css('color', '#73879c');
                }
            },
            error: function(data) {
                console.log(data.message)
            }
        })
    }
</script>
@endsection

@section('styles')
@parent
{{ Html::style('assets/teeth.css') }}
@endsection