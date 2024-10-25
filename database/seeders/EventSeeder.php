<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // You can set the organization here according to your logic
        $organization = 'CCIS Student Council'; // Example organization, adjust as necessary

        Event::create([
            'title' => 'Student Community Day',
            'description' => 'An exciting day for students to engage in community activities.',
            'href' => 'https://facebook.com/event1',
            'image' => 'events/event1.jpg',
            'category' => 'In-Campus',
            'organization' => $organization // Assigning organization
        ]);

        Event::create([
            'title' => 'Tanglaw Fest',
            'description' => 'The annual Tanglaw Fest celebrates PUP with various events.',
            'href' => 'https://facebook.com/event2',
            'image' => 'events/event2.jpg',
            'category' => 'In-Campus',
            'organization' => $organization // Assigning organization
        ]);

        Event::create([
            'title' => 'General Assembly',
            'description' => 'The second general assembly for PUP programmers.',
            'href' => 'https://facebook.com/event3',
            'image' => 'events/event3.jpg',
            'category' => 'In-Campus',
            'organization' => $organization // Assigning organization
        ]);
    }
}
