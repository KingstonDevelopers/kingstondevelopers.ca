<?php

namespace App\Contracts;


interface MeetupApiContract
{
    public function getUpcomingMeetups(int $limit = 5): array;
}
