@extends('admin.layouts.admin')

@section('title', 'Citas')

@section('content')
<div class="row">
    <div class="x_content">
    </div>
</div>

@yield('content_appointment')

@endsection

@section('styles')
@parent
{{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection