<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can update the event.
     */
    public function update(User $user, Event $event)
    {
        // Only allow the user to update if their organization matches
        return $user->name_of_organization === $event->organization;
    }

    /**
     * Determine if the given user can delete the event.
     */
    public function delete(User $user, Event $event)
    {
        // Only allow the user to delete if their organization matches
        return $user->name_of_organization === $event->organization;
    }
}
