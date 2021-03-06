<?php

namespace App\Policies;

use App\Conflict;
use App\ConflictSeries;
use App\Justice;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Request;

class JusticePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any justice.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the justice.
     *
     * @param  \App\User  $user
     * @param  \App\Justice  $justice
     * @return mixed
     */
    public function view(?User $user, Justice $justice)
    {
        return true;
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

        // Change Justice Policy to ConflictJustice Policy in future
        // Right now we have this ductape way
        if ($user->role == 'coder') {
            return true;
        }

        $conflictSeries = ConflictSeries::find(Request::query('conflict'));

        $ucdpIds = $user->tasks->pluck('conflict_ucdp_id');

        $tasked = $ucdpIds->contains($conflictSeries->conflict_id);

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

        if ($justice->user) {
            return $justice->user->id == $user->id;
        }

        $conflict = $justice->conflict;

        $tasked = $user->tasks->firstWhere('conflict_ucdp_id', $conflict->conflict_id);

        if (! $tasked) {
            return false;
        }

        if ($tasked->status >= 2) {
            return false;
        }

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
        if ($user->role == 'admin') {
            return true;
        }

        $conflict = $justice->conflict;

        $ucdpIds = $user->tasks->pluck('conflict_ucdp_id');
        $tasked = $ucdpIds->contains($conflict->conflict_id);

        return $tasked;
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
