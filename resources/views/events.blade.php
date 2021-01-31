@extends('layouts.www')

@section('title', 'Home')

@section('content')
    <div class="jumbotron jumbotron-fluid bg-header text-light">
        <div class="container">
            <h1 class="display-4">Upcoming events</h1>
            <p class="lead">Hope to see you at the next one!</p>
        </div>
    </div>

    @if ($next_event)
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-4 font-weight-normal">{{ $next_event['name'] }}</h1>
                <hr class="dark-divider">
                <p class="lead font-weight-normal">{{ $next_event['yes_rsvp_count'] }} developers going</p>
                <p class="lead font-weight-normal">
                    {{ \Carbon\Carbon::createFromTimestamp($next_event['time'] / 1000, 'EST5EDT')->toDayDateTimeString() }}
                    <br>
                    <strong>({{ \Carbon\Carbon::createFromTimestamp($next_event['time'] / 1000, 'EST5EDT')->diffForHumans() }}
                        )</strong>
                </p>
                <a class="btn btn-primary" target="_blank" href="{{ $next_event['link'] }}">RSVP Today!</a>
            </div>
            <div class="product-device box-shadow d-none d-md-block"></div>
            <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
        </div>
    @else
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
            <p>No upcoming events. Most likely this is because meetup API is not working correctly.</p>
            <p>Please see <a href="https://meetup.com/Kingston-Developers/" target="_blank">Meetup</a> to be sure.</p>
        </div>
    @endif

    @foreach ($upcoming_events as $row => $events)
        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
            @foreach ($events as $index => $event)
                <?php
                $dark_card = ($row % 2 === 0) ? ($index % 2 === 0) : ($index % 2 === 1);
                ?>
                <div
                    class="<?= ($dark_card) ? 'bg-dark text-white' : 'bg-light'?> mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                    <div class="my-3 py-3">
                        <h2 class="display-5">{{ $event['name'] }}</h2>
                        @if ($dark_card)
                            <hr class="dark-divider">
                        @else
                            <hr class="light-divider">
                        @endif
                        <p class="lead font-weight-normal">{{ $event['yes_rsvp_count'] }} developers going</p>
                        <p class="lead font-weight-normal">
                            {{ \Carbon\Carbon::createFromTimestamp($event['time'] / 1000, 'EST5EDT')->toDayDateTimeString() }}
                        </p>
                    </div>
                    <p>
                        @if ($dark_card)
                            <a class="btn btn-light" target="_blank" href="{{ $event['link'] }}">RSVP Today!</a>
                        @else
                            <a class="btn btn-dark" target="_blank" href="{{ $event['link'] }}">RSVP Today!</a>
                        @endif
                    </p>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
