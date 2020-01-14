<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .row {
            width: 100%;
            display: block;
            height: inherit;
        }

        .col-1 {
            width: 10%;
            display: inline-block;
        }

        .col-2 {
            width: 20%;
            display: inline-block;
        }

        .col-3 {
            width: 30%;
            display: inline-block;
        }

        .col-4 {
            width: 40%;
            display: inline-block;
        }

        .col-5 {
            width: 50%;
            display: inline-block;
        }

        .col-6 {
            width: 60%;
            display: inline-block;
        }

        .col-7 {
            width: 70%;
            display: inline-block;
        }

        .col-8 {
            width: 80%;
            display: inline-block;
        }

        .col-9 {
            width: 90%;
            display: inline-block;
        }

        .col-10 {
            width: 100%;
            display: inline-block;
        }

        .offset-2 {
            width: 70%;
            margin-left: 15%;
            display: inline-block;
        }

        .text-center {
            text-align: center;
        }

        .logo {
            width: 100%;
        }

        .title {
            margin-top: 0;
            margin-bottom: 0;
            text-align: center;
        }

        .table {
            width: 100%;
        }

        .tooth-adult {
            width: 5.7%;
            display: inline-block;
            vertical-align: top;
        }

        .tooth-young {
            width: 9.2%;
            display: inline-block;
        }

        .tooth {
            width: 100%;
        }

        th,
        td {
            text-align: center;
            border: 1px solid black;
        }

        .toggle {
            width: 10px;
            height: 10px;
            border: 1px solid black;
            display: inline-block;
            margin-right: 5px;
        }

        .toggle-xs {
            width: 6.5px;
            height: 6px;
            margin: 0 !important;
            border: none !important;
        }

        .toggle-frac {
            background-color: red;
        }

        .toggle-obs {
            background-color: blue;
        }

        .toggle-ext {
            background-color: yellow;
        }

        .toggle-aex {
            background-color: green;
        }

        .toggle-pue {
            background-color: purple;
        }

        .tooth-header {
            border: 1px solid black;
        }

    </style>
</head>

<body>
    <div class="row">
        <div class="col-1">
            <img class="logo" src="{{asset('assets/clin.jpeg')}}">
        </div>
        <div class="col-9">
            <h2 class="title">CLINICA DENTAL DR. RODRIGO ORELLANA</h2>
            <h4 class="title">Atención de la salud bucal</h4>
        </div>
    </div>
    <div class="row">
        <span class="col-4">N° de expediente: {{$consultation->id}}</span>
        <span class="col-4">Fecha de impresion: {{date("Y-m-d H:i:s")}}</span>
    </div>
    <br>
    <h3>Datos del consultorio: </h3>
    <div class="row">
        <span class="col-8">Atendido por: ___________________________________________</span>
    </div>
    <br>
    <div class="row">
        <span class="col-3">Teléfono: 76017331</span>
        <span class="col-4">Fecha de consulta: {{date('d/m/Y', strtotime($consultation->updated_at))}}</span>
        <span class="col-4">Teléfono secundario: _________</span>
    </div>
    <h3>Datos del paciente: </h3>
    <div class="row">
        <h3>Nombre completo: {{$consultation->turn->patient->name}} {{$consultation->turn->patient->apellido}}</h3>
    </div>
    <br>
    <div class="row">
        @if (isset($consultation->turn->patient->dui))
        <span class="col-3">N° de DUI: {{$consultation->turn->patient->dui}}</span>
        @else
        <span class="col-3">N° de DUI: -</span>
        @endif
        <span class="col-4">Fecha de nacimiento: {{date('d/m/Y', strtotime($consultation->turn->patient->born))}}</span>
        @if(isset($consultation->turn->patient->phone))
        <span class="col-3">Teléfono: {{$consultation->turn->patient->phone}}</span>
        @else
        <span class="col-3">Teléfono: -</span>
        @endif
    </div>
    @if(isset($consultation->turn->appointment))
    <div class="row">
        <span>Cita</span><br>
        <table class="table">
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Motivo</th>
            </tr>
            <tr>
                <td>{{$consultation->turn->appointment->day}}</td>
                <td>{{$consultation->turn->appointment->hour}}</td>
                <td>{{$consultation->turn->appointment->reason}}</td>
            </tr>
        </table>
    </div>
    @endif
    <div class="row">
        <h3>Servicios:</h3>
    </div>
    <div class="row">
        <div>
            @foreach($services as $s)
            <span class="col-3">
               {{$s->name}}
            </span>
            @endforeach
        </div>
    </div>
    <div class="row">
        <h3>Odontograma:</h3>
    </div>
    <br>
    <div class="row">
        <div class="text-center">
            @foreach($jobs as $job)
            <span class="col-2">
                <div class="toggle {{$job->class}}"></div>{{$job->name}}
            </span>
            @endforeach
        </div>
    </div>
    <div class="row">
        @foreach($consultation->teeth as $i => $tooth)
        @if($i < 16)
            <div class="tooth-adult">
                <div class="tooth-header">
                    <div class="row text-center">
                        <span>{{$tooth->name}}</span>
                    </div>
                    <div class="row text-center">
                        @foreach($jobs as $job)
                        @if(in_array($job->id, $tooth->jobs))
                        <div class="toggle toggle-xs {{$job->class}}"></div>
                        @endif
                        @endforeach
                    </div>
                    <div class="row">
                        <img class="tooth" src="{{asset('/assets/' . $tooth->img)}}">
                    </div>
                </div>
            </div>
        @endif
        @endforeach
    </div>
    <br>
    <div class="row">
        @foreach($consultation->teeth as $i => $tooth)
        @if($i > 15 && $i < 32)
            <div class="tooth-adult">
                <div class="tooth-header">
                    <div class="row text-center">
                        <span>{{$tooth->name}}</span>
                    </div>
                    <div class="row text-center">
                        @foreach($jobs as $job)
                        @if(in_array($job->id, $tooth->jobs))
                        <div class="toggle toggle-xs {{$job->class}}"></div>
                        @endif
                        @endforeach
                    </div>
                    <div class="row">
                        <img class="tooth" src="{{asset('/assets/' . $tooth->img)}}">
                    </div>
                </div>
            </div>
        @endif
        @endforeach
    </div>
    <br>
    <div class="row">
        <div class="offset-2">
            @foreach($consultation->teeth as $i => $tooth)
            @if($i > 31 && $i < 42)
                <div class="tooth-young">
                    <div class="tooth-header">
                        <div class="row text-center">
                            <span>{{$tooth->name}}</span>
                        </div>
                        <div class="row text-center">
                            @foreach($jobs as $job)
                            @if(in_array($job->id, $tooth->jobs))
                            <div class="toggle toggle-xs {{$job->class}}"></div>
                            @endif
                            @endforeach
                        </div>
                        <div class="row">
                            <img class="tooth" src="{{asset('/assets/' . $tooth->img)}}">
                        </div>
                    </div>
                </div>
            @endif
            @endforeach
        </div>
    </div>
    <br>
    <div class="row">
        <div class="offset-2">
            @foreach($consultation->teeth as $i => $tooth)
            @if($i > 41)
                <div class="tooth-young">
                    <div class="tooth-header">
                        <div class="row text-center">
                            <span>{{$tooth->name}}</span>
                        </div>
                        <div class="row text-center">
                            @foreach($jobs as $job)
                            @if(in_array($job->id, $tooth->jobs))
                            <div class="toggle toggle-xs {{$job->class}}"></div>
                            @endif
                            @endforeach
                        </div>
                        <div class="row">
                            <img class="tooth" src="{{asset('/assets/' . $tooth->img)}}">
                        </div>
                    </div>
                </div>
            @endif
            @endforeach
        </div>
    </div>
    <div class="row">
        <h3>Comentarios:</h3>
    </div>
    <div class="row">
    <span>{{$consultation->comment}}</span>
    </div></body>

</html>
