@extends('layouts.www')

@section('title', 'Job Board')

@section('content')
    <div class="jumbotron jumbotron-fluid bg-header text-light">
        <div class="container">
            <h1 class="display-4">Job Board</h1>
            <p class="lead">For now here's a list of links to places jobs may be posted. Soon we'll have our own custom
                job board.</p>
        </div>
    </div>

    <div class="container">
        <table class="table">
            <tr>
                <th>Job Board</th>
            </tr>
            @foreach ($job_sites as $job_site)
                <tr>
                    <td><a target="_blank" href="{{ $job_site['url'] }}">{{ $job_site['name'] }}</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
