<?php

namespace App\Helpers;

use App\Models\Schedule;
use App\Models\Venue;
use Carbon\Carbon;

class AvaileableDates
{
    public static function getAvailableDate(Venue $venue, $date)
    {
        $date = Carbon::parse($date)->addDay();

        while (true) {
            // Skip Fridays and Saturdays
            if ($date->isFriday() || $date->isSaturday()) {
                $date->addDay();
                continue;
            }
    
            // Check if there are already capacity of the vaccine scheduled for this day
            $taskCount = Schedule::where('scheduled_date', $date->toDateString())->where('venue_id', $venue->id)->count();
            if ($taskCount < $venue->capacity_per_day) {
                return $date->toDateString();
            }
    
            // Move to the next day if current day is full
            $date->addDay();
        }
    }
}
