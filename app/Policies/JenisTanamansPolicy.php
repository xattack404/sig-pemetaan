<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JenisTanamans;
use Illuminate\Auth\Access\HandlesAuthorization;

class JenisTanamansPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the jenisTanamans can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list alljenistanamans');
    }

    /**
     * Determine whether the jenisTanamans can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JenisTanamans  $model
     * @return mixed
     */
    public function view(User $user, JenisTanamans $model)
    {
        return $user->hasPermissionTo('view alljenistanamans');
    }

    /**
     * Determine whether the jenisTanamans can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create alljenistanamans');
    }

    /**
     * Determine whether the jenisTanamans can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JenisTanamans  $model
     * @return mixed
     */
    public function update(User $user, JenisTanamans $model)
    {
        return $user->hasPermissionTo('update alljenistanamans');
    }

    /**
     * Determine whether the jenisTanamans can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JenisTanamans  $model
     * @return mixed
     */
    public function delete(User $user, JenisTanamans $model)
    {
        return $user->hasPermissionTo('delete alljenistanamans');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JenisTanamans  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete alljenistanamans');
    }

    /**
     * Determine whether the jenisTanamans can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JenisTanamans  $model
     * @return mixed
     */
    public function restore(User $user, JenisTanamans $model)
    {
        return false;
    }

    /**
     * Determine whether the jenisTanamans can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JenisTanamans  $model
     * @return mixed
     */
    public function forceDelete(User $user, JenisTanamans $model)
    {
        return false;
    }
}
