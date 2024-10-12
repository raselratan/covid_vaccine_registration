<?php

namespace App\Console\Commands;

use App\Jobs\EmailNotification;
use App\Models\Schedule;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the current date and add one day to get tomorrow's date
        $today = now()->toDateString();
        $tomorrow = now()->addDay()->toDateString(); // or use Carbon

        $schedules = DB::table('schedules')->where('scheduled_date', $tomorrow)
        ->join('users', 'schedules.user_id', '=', 'users.id')
        ->join('venues', 'users.venue_id', '=', 'venues.id')
        ->select('users.name', 'users.email', 'users.status', 'venues.name as venue', DB::raw("DATE_FORMAT(schedules.scheduled_date, '%W, %d-%M-%Y') as scheduled_date"))
        ->get();

        foreach($schedules as $schedule){
           EmailNotification::dispatch($schedule->name, $schedule->email, 'Vaccination Scedule', $schedule->scheduled_date, $schedule->venue)->onQueue('high');
        }

        $completed = DB::table('schedules')->where('scheduled_date', $today)
        ->join('users', 'schedules.user_id', '=', 'users.id')
        ->select('users.id as user_id', 'schedules.id as schedule_id')
        ->get();

        DB::table('users')->whereIn('id', $completed->pluck('user_id'))->update(['status' => 'Vaccinated']);
        DB::table('schedules')->whereIn('id', $completed->pluck('schedule_id'))->update(['dosage' => 1]);

    }
}
