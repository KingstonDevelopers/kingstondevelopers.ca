@extends('layouts.www')

@section('title', 'Home')

@section('content')
    <div class="p-3 p-md-5 text-center bg-home-header text-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <img class="logo" src="/img/logo_k.svg">
            <hr class="light-divider">
            <h1 class="display-4 font-weight-normal">Code with us in the Limestone City</h1>
        </div>
    </div>

    <div class="p-3 p-md-5 bg-dark text-light text-center" id="about-us">
        <div class="container">
            <h2 class="display-5 font-weight-normal">About Us</h2>
            <hr class="light-divider">
            <p class="lead font-weight-normal">
                We are awesome people who work within the software industry. Everyone is welcome, no experience required.
            </p>
            <p class="lead font-weight-normal">
                We're always looking for volunteers to give talks to the group. Talks do not have to be strictly related to software development as we have many coders turned into business owners and vice versa that could benefit from your experience!
            </p>
        </div>
    </div>

    <div class="p-3 p-md-5 bg-light text-center" id="get-involved">
        <div class="container">
            <h2 class="display-5 font-weight-normal">Get Involved</h2>
            <hr class="dark-divider">
            <div class="row">
                <div class="col-lg-4">
                    <p>Come out to our events</p>
                    <p class="text-center"><div class="event-icon"></div></p>
                    <p>
                        <a class="btn btn-outline-primary" href="/events">Events</a>
                    </p>
                </div>
                <div class="col-lg-4">
                    <p>Find a job</p>
                    <p class="text-center"><div class="work-icon"></div></p>
                    <p>
                        <a class="btn btn-outline-primary" href="/jobs">Job Board</a>
                    </p>
                </div>
                <div class="col-lg-4">
                    <p>Join us on Slack</p>
                    <p class="text-center"><div class="chat-icon"></div></p>
                    <p>
                        <a class="btn btn-outline-primary" href="http://slack.kingstondevelopers.ca" target="_blank">Get your invite</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="p-3 p-md-5 bg-dark text-light text-center" id="social">
        <div class="container">
            <h2 class="display-5 font-weight-normal">Join us on</h2>
            <hr class="light-divider">
            <a class="btn text-light" href="https://www.facebook.com/groups/kingstonDevelopers" target="_blank">
                <i class="fa fa-fw fa-2x fa-facebook"></i>
            </a>
            <a class="btn text-light" href="https://twitter.com/ygkdevs" target="_blank">
                <i class="fa fa-fw fa-2x fa-twitter"></i>
            </a>
            <a class="btn text-light" href="http://slack.kingstondevelopers.ca" target="_blank">
                <i class="fa fa-fw fa-2x fa-slack"></i>
            </a>
            <a class="btn text-light" href="https://meetup.com/Kingston-Developers/" target="_blank">
                <i class="fa fa-fw fa-2x fa-meetup"></i>
            </a>
            <a class="btn text-light" href="https://github.com/KingstonDevelopers" target="_blank">
                <i class="fa fa-fw fa-2x fa-github"></i>
            </a>
        </div>
    </div>
@endsection