<?php

namespace App\Policies;

use App\Models\User;
use App\Models\LimitStok;
use Illuminate\Auth\Access\HandlesAuthorization;

class LimitStokPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the limitStok can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list limitstoks');
    }

    /**
     * Determine whether the limitStok can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\LimitStok  $model
     * @return mixed
     */
    public function view(User $user, LimitStok $model)
    {
        return $user->hasPermissionTo('view limitstoks');
    }

    /**
     * Determine whether the limitStok can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create limitstoks');
    }

    /**
     * Determine whether the limitStok can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\LimitStok  $model
     * @return mixed
     */
    public function update(User $user, LimitStok $model)
    {
        return $user->hasPermissionTo('update limitstoks');
    }

    /**
     * Determine whether the limitStok can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\LimitStok  $model
     * @return mixed
     */
    public function delete(User $user, LimitStok $model)
    {
        return $user->hasPermissionTo('delete limitstoks');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\LimitStok  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete limitstoks');
    }

    /**
     * Determine whether the limitStok can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\LimitStok  $model
     * @return mixed
     */
    public function restore(User $user, LimitStok $model)
    {
        return false;
    }

    /**
     * Determine whether the limitStok can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\LimitStok  $model
     * @return mixed
     */
    public function forceDelete(User $user, LimitStok $model)
    {
        return false;
    }
}
