@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><strong><i class="fa fa-user-circle-o" aria-hidden="true"></i>
Autenticação de Usuários</strong></div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                       <div class="col-md-12">
                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="name">E-mail:</label>
                                <input id="email" type="text" class="form-control" name="email" maxlength="150" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="name">Senha:</label>
                                <input id="password" type="password"  class="form-control" name="password" maxlength="100" value="{{ old('password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                          </div>

                       <div class="col-md-12">
                          <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Lembrar
                                    </label>
                                </div>
                            </div>
                        </div>

                       <div class="col-xs-12">
                          <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                <strong><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
 Acessar</strong>
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Esqueceu sua senha?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
