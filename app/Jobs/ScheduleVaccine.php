<?php

namespace App\Jobs;

use App\Helpers\AvaileableDates;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ScheduleVaccine implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected User $user)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $venue = Venue::find($this->user->venue_id);
        
        if($venue){
            $available_date = AvaileableDates::getAvailableDate($venue, $this->user->created_at);
            
            Schedule::create([
                "user_id" => $this->user->id,
                "venue_id" => $venue->id,
                "scheduled_date" => $available_date
            ]);

            $updateSchedule = User::find($this->user->id);
            
            if($updateSchedule){
                $updateSchedule->status = 'Scheduled';
                $updateSchedule->save();
            }
        }

        return;
    }
}
