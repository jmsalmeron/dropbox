<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriptionPolicy
{
    use HandlesAuthorization;

    public function payForThis(User $user)
    {
        if ($user->hasRole('ADMIN')){
            return false;
        }
        return true;
    }
}
