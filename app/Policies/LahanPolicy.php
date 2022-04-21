<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Lahan;
use Illuminate\Auth\Access\HandlesAuthorization;

class LahanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the lahan can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list lahans');
    }

    /**
     * Determine whether the lahan can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Lahan  $model
     * @return mixed
     */
    public function view(User $user, Lahan $model)
    {
        return $user->hasPermissionTo('view lahans');
    }

    /**
     * Determine whether the lahan can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create lahans');
    }

    /**
     * Determine whether the lahan can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Lahan  $model
     * @return mixed
     */
    public function update(User $user, Lahan $model)
    {
        return $user->hasPermissionTo('update lahans');
    }

    /**
     * Determine whether the lahan can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Lahan  $model
     * @return mixed
     */
    public function delete(User $user, Lahan $model)
    {
        return $user->hasPermissionTo('delete lahans');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Lahan  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete lahans');
    }

    /**
     * Determine whether the lahan can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Lahan  $model
     * @return mixed
     */
    public function restore(User $user, Lahan $model)
    {
        return false;
    }

    /**
     * Determine whether the lahan can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Lahan  $model
     * @return mixed
     */
    public function forceDelete(User $user, Lahan $model)
    {
        return false;
    }
}
