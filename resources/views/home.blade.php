@extends('layouts.app')

 @section('header')
    <div class="container">
      <div class="intro-text">
        <br><br><br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                        <div class="card-header">{{ __('Login') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                @csrf
                                @if(session()->has('login_error'))
                                    <div class="alert alert-success">
                                      {{ session()->get('login_error') }}
                                    </div>
                                @endif
                                <div class="form-group row">
                                    <label for="identity" class="col-sm-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                    <div class="col-md-6">
                                        <input id="identity" type="identity" class="form-control{{ $errors->has('identity') ? ' is-invalid' : '' }}" name="identity" value="{{ old('identity') }}" required autofocus>

                                        @if ($errors->has('identity'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('identity') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-2">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    @endsection
