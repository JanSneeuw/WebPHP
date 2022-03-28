<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given user can create new superAdmin.
     * @param User $user
     * @return bool
     */
    public function registerSuperAdmin(User $user)
    {
        return $user->isAdmin();
    }
}
