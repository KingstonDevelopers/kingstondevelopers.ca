<?php

namespace App\Http\Controllers;

use App\Service\Meetup;
use Carbon\Carbon;
//use DMS\Service\Meetup\MeetupKeyAuthClient;

class MeetupController extends Controller
{
    public function showMeetups()
    {
        $events = [];
//        $events     = $this->getEvents();
        $next_event = array_shift($events);
        $upcoming_events = [];
        $row             = [];
        $row_count       = 0;

        foreach ($events as $index => $event)
        {
            $row[] = $event;
            $row_count++;
            if ($row_count === 2)
            {
                $row_count         = 0;
                $upcoming_events[] = $row;
                $row               = [];

                if (count($upcoming_events) >= 2)
                    break;
            }
        }


        if (!empty($row))
            $upcoming_events[] = $row;

        return view('events', [
            'next_event'      => $next_event,
            'upcoming_events' => $upcoming_events,
        ]);
    }

    public function getUpcoming()
    {
        return response()->json($this->getEvents());
    }

    public function getEvents()
    {
        $cache_results = config('meet.cache_results', false);
        $cache_key     = 'meetup_upcoming_events_v3';

        $upcoming_events = ($cache_results) ? \Cache::get($cache_key, false) : false;

        if ($upcoming_events === false)
        {
            $meetup          = new Meetup();
            $upcoming_events = $meetup->getUpcomingMeetups(10);
            $expiresAt       = Carbon::now()->addSeconds(30);

            if ($cache_results === true)
                \Cache::put($cache_key, $upcoming_events, $expiresAt);
        }

        return $upcoming_events;
    }
}
