<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Panen;
use Illuminate\Auth\Access\HandlesAuthorization;

class PanenPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the panen can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list panens');
    }

    /**
     * Determine whether the panen can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Panen  $model
     * @return mixed
     */
    public function view(User $user, Panen $model)
    {
        return $user->hasPermissionTo('view panens');
    }

    /**
     * Determine whether the panen can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create panens');
    }

    /**
     * Determine whether the panen can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Panen  $model
     * @return mixed
     */
    public function update(User $user, Panen $model)
    {
        return $user->hasPermissionTo('update panens');
    }

    /**
     * Determine whether the panen can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Panen  $model
     * @return mixed
     */
    public function delete(User $user, Panen $model)
    {
        return $user->hasPermissionTo('delete panens');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Panen  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete panens');
    }

    /**
     * Determine whether the panen can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Panen  $model
     * @return mixed
     */
    public function restore(User $user, Panen $model)
    {
        return false;
    }

    /**
     * Determine whether the panen can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Panen  $model
     * @return mixed
     */
    public function forceDelete(User $user, Panen $model)
    {
        return false;
    }
}
