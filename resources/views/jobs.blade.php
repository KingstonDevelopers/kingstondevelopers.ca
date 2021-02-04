@extends('layouts.www')

@section('title', 'Job Board')

@section('content')
    <div class="p-5 mb-5 bg-header text-light">
        <div class="container">
            <h1 class="display-4">Job Board</h1>
            <p class="lead">For now here's a list of links to places jobs may be posted.</p>
        </div>
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                <tr>
                    <th scope="col">Job Board</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($job_sites as $job_site)
                    <tr>
                        <td>
                            <a target="_blank" href="{{ $job_site['url'] }}">
                                {{ $job_site['name'] }}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
