<?php

namespace App\Http\Controllers;

use App\Contracts\MeetupApiContract;

class HomeController extends Controller
{
    private MeetupApiContract $meetupApi;

    public function __construct(MeetupApiContract $meetupApi)
    {
        $this->meetupApi = $meetupApi;
    }

    public function showHome()
    {
        $allEvents = collect($this->meetupApi->getUpcomingMeetups());
        $upcomingEvents = $allEvents->filter(
            function ($event) {
                return $event->status === 'upcoming';
            }
        );

        if ($upcomingEvents->count() === 0) {
            $upcomingEvents = $allEvents;
        }

        $upcomingEvents = $upcomingEvents->map(function($event){
//            dd($event);
            $date = new \Carbon\Carbon($event->time / 1000);
            $date->setTimezone('EST5EDT');
            $event->event_date = $date;
            return $event;
        });
        return view('home', ['events' => $upcomingEvents]);
    }
}
