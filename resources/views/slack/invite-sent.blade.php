@extends('layouts.www')

@section('title', 'Invite sent!')

@section('content')
    <div class="jumbotron jumbotron-fluid bg-header text-light">
        <div class="container">
            <h1 class="display-4"><i class="fa fa-slack"></i> Slack</h1>
            <p class="lead">
                Join the <b class="active">{{ $members['total'] }}</b> developers on the
                <strong>{{ config('slack.community') }}</strong> on Slack.
            </p>
        </div>
    </div>

    <div class="container">
        <div class="text-center">
            <img src="{{ $logo }}" alt="{{ config('slack.community') }}" class="rounded-circle"/><br/>
            @if(config('slack.presence'))
                <p class="status">
                    <b class="active">{{ $members['online'] }}</b>
                    developers online now.
                </p>
            @endif
        </div>

        <div class="col-md-6 mx-auto">
            <hr>
            <p class="">
            @if ($response->ok === false)
                @if ($response->error === 'invalid_email')
                    <div class="alert alert-danger">
                        <h4 class="alert-heading ">Error!</h4>
                        <p class="lead">
                            The email you provided was invalid. Please <a href="/slack/invite">try again</a>.
                        </p>
                    </div>
                @elseif ($response->error === 'already_invited' || $response->error === 'already_in_team' || $response->error === 'already_in_team_invited_user')
                    <div class="alert alert-success">
                        <h4 class="alert-heading ">Succcess!</h4>
                        <p class="lead">
                            Success! You were already invited.<br>
                            Visit <a href="https://{{ config('slack.url') }}">{{ config('slack.community') }}
                        </p>
                    </div>
                @else
                    <div class="alert alert-danger">
                        <h4 class="alert-heading ">Error!</h4>
                        <p class="lead">
                            Slack returned with an unknown error.
                        </p>
                        <pre><code>{{ json_encode($response, JSON_PRETTY_PRINT) }}</code></pre>
                    </div>
                @endif
            @else
                <div class="alert alert-success">
                    <h4 class="alert-heading ">Success!</h4>
                    <p class="lead">Check &ldquo;{{ $email }}&rdquo; for an invite from Slack.</p>
                </div>
            @endif
        </div>
    </div>

@endsection
