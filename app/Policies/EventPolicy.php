<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the user can create events.
     */
    public function create(User $user)
    {
        return $user->is_admin == 1 || $user->is_admin == 2; // Allow if user is admin or organization user
    }

    public function update(User $user, Event $event)
    {
        // Admins can update any event
        if ($user->is_admin == 1) {
            return true;
        }
        // Organization users can only update their own organization's events
        return $user->name_of_organization === $event->organization;
    }
    
    public function delete(User $user, Event $event)
    {
        // Admins can delete any event
        if ($user->is_admin == 1) {
            return true;
        }
        // Organization users can only delete their own organization's events
        return $user->name_of_organization === $event->organization;
    }
}    
