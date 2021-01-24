@extends('layouts.www')

@section('title', 'Job Board')

@section('content')
    <div class="p-3 p-md-5 m-md-3 text-center bg-home-header text-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 font-weight-normal">Job Board</h1>
            <p>For now here's a list of links to places jobs may be posted. Soon we'll have our own custom job board.</p>
            <p><small>P.S. If you're looking for a side project, contact Lee, he needs help with this ;)</small></p>
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