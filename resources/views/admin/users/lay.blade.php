@extends('admin.layouts.admin')

@section('title', 'Nuevo usuario')

@section('content')

@yield('content_paciente')
@endsection

@section('styles')
@parent
{{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection
