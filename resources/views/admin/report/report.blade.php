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
        <div class="col-12">
            <h5>Desde {{$dates['init']}}
                <br>
                Hasta {{$dates['final']}}</h5>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DUI</th>
                    <th>Edad</th>
                    <th>Fecha de la consulta</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consultations as $consultation)
                <tr>
                    <td>{{$consultation->turn->patient->name}}</td>
                    <td>{{$consultation->turn->patient->apellido}}</td>
                    <td>{{$consultation->turn->patient->dui}}</td>
                    <td>{{$consultation->turn->patient->age}}</td>
                    <td>{{$consultation->created_at}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>