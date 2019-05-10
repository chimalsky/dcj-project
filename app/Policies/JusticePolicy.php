<?php

namespace App\Policies;

use Request;
use App\User;
use App\Justice;
use App\Conflict;
use Illuminate\Auth\Access\HandlesAuthorization;

class JusticePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the justice.
     *
     * @param  \App\User  $user
     * @param  \App\Justice  $justice
     * @return mixed
     */
    public function view(User $user, Justice $justice)
    {
        //
    }

    /**
     * Determine whether the user can create justices.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->role == 'admin') {
            return true;
        }

        $conflict = Conflict::find(Request::query('conflict'));
        
        $ucdpIds = $user->tasks->pluck('conflict_ucdp_id');
        $tasked = $ucdpIds->contains($conflict->conflict_id);
        return $tasked;
    }

    /**
     * Determine whether the user can update the justice.
     *
     * @param  \App\User  $user
     * @param  \App\Justice  $justice
     * @return mixed
     */
    public function update(User $user, Justice $justice)
    {
        if ($user->role == 'admin') {
            return true;
        }

        $conflict = $justice->conflict;
        
        $ucdpIds = $user->tasks->pluck('conflict_ucdp_id');
        $tasked = $ucdpIds->contains($conflict->conflict_id);
        return $tasked;
    }

    /**
     * Determine whether the user can delete the justice.
     *
     * @param  \App\User  $user
     * @param  \App\Justice  $justice
     * @return mixed
     */
    public function delete(User $user, Justice $justice)
    {
        //
    }

    /**
     * Determine whether the user can restore the justice.
     *
     * @param  \App\User  $user
     * @param  \App\Justice  $justice
     * @return mixed
     */
    public function restore(User $user, Justice $justice)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the justice.
     *
     * @param  \App\User  $user
     * @param  \App\Justice  $justice
     * @return mixed
     */
    public function forceDelete(User $user, Justice $justice)
    {
        //
    }
}
