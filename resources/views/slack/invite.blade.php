@extends('layouts.www')

@section('title', 'Join us on slack')

@section('content')

    <div class="p-5 mb-5 bg-header text-light">
        <div class="container">
            <h1 class="display-4"><i class="fab fa-slack"></i> Slack</h1>
            <p class="lead">
                Join the <b class="active">{{ $members }}</b> developers on the
                <strong>{{ config('slack.community') }}</strong> on Slack.
            </p>
        </div>
    </div>

    <div class="container">
        <div class="text-center">
            <img src="{{ $logo }}" alt="{{ config('slack.community') }}" class="rounded-circle"/><br/>
            Join the <b class="active">{{ $members }}</b> developers on the
            <strong>{{ config('slack.community') }}</strong> on Slack.<br>
        </div>

        <div class="col-md-6 mx-auto">
            <hr>
            <form method="post">
                <div class="mb-3">
                    <label class="form-label" for="email">Email address</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" required name="email"
                           value="{{ old('email') }}"
                           placeholder="you@yourdomain.com"/>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{$errors->first('email')}}
                        </div>
                    @endif
                </div>

                <div class="text-center">
                <button type="submit" class="btn btn-primary">Join</button>
                <span class="sign-in">or <a href="http://{{ config('slack.url') }}">sign in</a></span>
                </div>
                {!! csrf_field() !!}
            </form>
        </div>
    </div>
@endsection
