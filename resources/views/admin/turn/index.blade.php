@extends('admin.layouts.admin')

@section('title', 'Orden de consulta')

@section('content')
<div class="row">
    <div class="x_content">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="" class="nav-link">Turnos</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Consultas</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Citas</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Pacientes</a>
            </li>
        </ul>
    </div>
</div>

@yield('content_turn')

@endsection