<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use Carbon\Carbon;

class DeletePastEvents extends Command
{
    protected $signature = 'events:delete-past';
    protected $description = 'Delete events that are past their scheduled date by one day';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get today's date
        $today = Carbon::now();

        // Delete events where the event date is one day in the past
        Event::where('event_date', '<', $today->subDay())->delete();

        $this->info('Past events deleted successfully!');
    }
}
