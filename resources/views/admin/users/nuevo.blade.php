@extends('admin.users.lay')

@section('content_paciente')
<div>
    <div class="login_wrapper">
        <div class="animate form">
            <section class="login_content">
                {{Form::open(['route' => ['admin.users.create'], 'method' => 'post', 'class' => 'form-horizontal'])}}
                <div>
                    <input type="text" name="name" class="form-control"
                        placeholder="{{ __('views.auth.register.input_0') }}" value="{{ old('name') }}" required
                        autofocus />
                </div>
                <div>
                    <input type="email" name="email" class="form-control"
                        placeholder="{{ __('views.auth.register.input_1') }}" required />
                </div>
                <div>
                    <input type="password" name="password" class="form-control"
                        placeholder="{{ __('views.auth.register.input_2') }}" required="" />
                </div>
                <div>
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="{{ __('views.auth.register.input_3') }}" required />
                </div>
                <div>
                    <select class="form-control" name="typeField" id="typeField" required>

                        <option value="" selected>Seleccione tipo de usuario</option>
                        <option value="1">Odontologo/a</option>
                        <option value="2">Secretario/a</option>
                    </select>
                </div>
                <br>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                @if (!$errors->isEmpty())
                <div class="alert alert-danger" role="alert">
                    {!! $errors->first() !!}
                </div>
                @endif

                @if(config('auth.captcha.registration'))
                @captcha()
                @endif

                <div>
                    <button type="submit"
                        class="btn btn-default submit">Registrar</button>
                </div>

                <div class="clearfix"></div>
                {{ Form::close() }}
            </section>
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
