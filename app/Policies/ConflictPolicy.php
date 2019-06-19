<?php

namespace App\Policies;

use App\User;
use App\Conflict;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConflictPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any conflict.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the conflict.
     *
     * @param  \App\User  $user
     * @param  \App\Conflict  $conflict
     * @return mixed
     */
    public function view(User $user, Conflict $conflict)
    {
        //
    }

    /**
     * Determine whether the user can create conflicts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the conflict.
     *
     * @param  \App\User  $user
     * @param  \App\Conflict  $conflict
     * @return mixed
     */
    public function update(User $user, Conflict $conflict)
    {
        //
    }

    /**
     * Determine whether the user can delete the conflict.
     *
     * @param  \App\User  $user
     * @param  \App\Conflict  $conflict
     * @return mixed
     */
    public function delete(User $user, Conflict $conflict)
    {
        //
    }

    /**
     * Determine whether the user can restore the conflict.
     *
     * @param  \App\User  $user
     * @param  \App\Conflict  $conflict
     * @return mixed
     */
    public function restore(User $user, Conflict $conflict)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the conflict.
     *
     * @param  \App\User  $user
     * @param  \App\Conflict  $conflict
     * @return mixed
     */
    public function forceDelete(User $user, Conflict $conflict)
    {
        //
    }

    /**
     * Determine whether user can attach a justice to conflict
     */

    public function attachJustice(User $user, Conflict $conflict)
    {
        if ($user->role == 'admin') {
            return true;
        }

        $conflictSeries = $conflict->series;
        
        $ucdpIds = $user->tasks->pluck('conflict_ucdp_id');
        $tasked = $ucdpIds->contains($conflictSeries->id);

        return $tasked;
    }
}
