<?php

namespace App\Policies;

use App\Models\PickUp;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PickUpPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PickUp  $pickUp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, PickUp $pickUp)
    {
        return $user->isAdmin() || $user->isAdministrative() || $user->isPacker();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->isAdministrative();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PickUp  $pickUp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PickUp $pickUp)
    {
        return $user->isAdmin() || $user->isAdministrative();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PickUp  $pickUp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, PickUp $pickUp)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PickUp  $pickUp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, PickUp $pickUp)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PickUp  $pickUp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, PickUp $pickUp)
    {
        //
    }

    public function setPickedUp(User $user){
        return $user->isAdmin() || $user->isAdministrative();
    }
}
