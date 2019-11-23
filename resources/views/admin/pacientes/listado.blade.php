@extends('admin.pacientes.index')

@section('content_paciente')
<div class="row">
    <div class="x_content">
        <br>
        <div class="col-md-12 col-sm-12">
            <div class="row">
                <div class="x_content">
                    <table class="table">
                        <th>
                            <tr>
                                <td>Nombre</td>
                                <td>Apellido</td>
                                <td>DUI</td>
                                <td>Phone</td>
                                <td>Sex</td>
                            </tr>
                        </th>
                        <tbody>
                            @foreach ($patients as $patient)
                            <tr>
                                <td>{{$patient->name}}</td>
                                <td>{{$patient->apellido}}</td>
                                <td>{{$patient->dui}}</td>
                                <td>{{$patient->phone}}</td>
                                <td>{{$patient->sex}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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