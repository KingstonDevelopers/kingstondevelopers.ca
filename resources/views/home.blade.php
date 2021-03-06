@extends('layouts.www')

@section('title', 'Home')

@section('content')
    <div class="p-3 p-md-5 text-center bg-home-header text-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <img class="logo" src="/img/logo_k.svg">
            <hr class="light-divider">
            <h1 class="display-4 fw-normal">Code with us in the Limestone City</h1>
        </div>
    </div>

    <div class="p-3 p-md-5 bg-dark text-light text-center" id="social">
        <div class="container">
            <h2 class="display-5 fw-normal">Join us on</h2>
            <hr class="light-divider">
            <a class="btn text-light" href="{{ app(\App\Contracts\DiscordApiContract::class)->getWidget()->instant_invite }}" target="_blank">
                <i class="fab fa-fw fa-2x fa-discord"></i>
            </a>
            <a class="btn text-light" href="https://www.facebook.com/groups/kingstonDevelopers" target="_blank">
                <i class="fab fa-fw fa-2x fa-facebook"></i>
            </a>
            <a class="btn text-light" href="https://twitter.com/ygkdevs" target="_blank">
                <i class="fab fa-fw fa-2x fa-twitter"></i>
            </a>
            <a class="btn text-light" href="{{ route('slack_show_invite') }}">
                <i class="fab fa-fw fa-2x fa-slack"></i>
            </a>
            <a class="btn text-light" href="https://meetup.com/Kingston-Developers/" target="_blank">
                <i class="fab fa-fw fa-2x fa-meetup"></i>
            </a>
            <a class="btn text-light" href="https://github.com/KingstonDevelopers" target="_blank">
                <i class="fab fa-fw fa-2x fa-github"></i>
            </a>
        </div>
    </div>

    <div class="p-3 p-md-5 bg-light text-dark text-center" id="upcoming">
        <div class="container">

            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-xxl-5 g-4">
                @foreach ($events as $event)
                    <div class="col">
                        <div class="card">
                            <img src="{{ $event->featured_photo->photo_link }}" class="card-img-top"
                                 alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->name }}</h5>
                                <p class="card-text text-weight">
                                    <strong>{{ $event->event_date->format('F jS, Y g:i a') }}</strong>
                                </p>
                                <p class="card-text">
                                    {{ $event->yes_rsvp_count }} {{ $event->group->who }} going
                                </p>
                                <p class="card-text">
                                    {{ $event->plain_text_no_images_description }}
                                </p>
                                <a class="btn btn-primary" href="{{ $event->link }}" target="_blank">RSVP</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </div>
    <div class="p-3 p-md-5 bg-dark text-light text-center" id="about-us">
        <div class="container">
            <h2 class="display-5 fw-normal">About Us</h2>
            <hr class="light-divider">
            <p class="lead fw-normal">
                We are awesome people who work within the software industry. Everyone is welcome, no experience
                required.
            </p>
            <p class="lead fw-normal">
                We're always looking for volunteers to give talks to the group. Talks do not have to be strictly related
                to software development as we have many coders turned into business owners and vice versa that could
                benefit from your experience!
            </p>
        </div>
    </div>
@endsection
