<?php

namespace App\Policies;

use Request;
use App\User;
use App\Task;
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
     * @param  \App\User  $user
     * @param  \App\Conflict  $conflict
     * @return mixed
     */ 
    public function attachJustice(User $user, Conflict $conflict)
    {        
        $conflictSeries = $conflict->series;

        $tasked = $user->tasks->firstWhere('conflict_ucdp_id', $conflictSeries->id);

        if (!$tasked) {
            return false;
        }

        if ($tasked->status >= 2) { 
            return false;
        }   

        return $tasked;
    }
}
