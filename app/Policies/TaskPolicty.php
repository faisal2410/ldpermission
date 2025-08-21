<?php

namespace App\Policies;

use App\Models\User;
use App\Models\task;
use Illuminate\Auth\Access\Response;

class TaskPolicty
{


    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('Administrator');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, task $task): bool
    {
        return $user->hasAnyRole(['Administrator', 'Manager'])
            || $task->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, task $task): bool
    {
        return $user->hasRole('Administrator');
    }


}
