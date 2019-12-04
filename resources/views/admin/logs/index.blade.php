@extends('admin.layouts.admin')

@section('title', 'Auditoria')

@section('content')
<div class="row">
    <div class="x_content">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.logs.list') }}">Listado de Servicios</a>
            </li>
        </ul>
    </div>
</div>

@yield('content_logs')
@endsection

@section('styles')
@parent
@endsection