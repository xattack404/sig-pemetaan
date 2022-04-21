<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TransaksiPetani;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransaksiPetaniPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the transaksiPetani can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list transaksipetanis');
    }

    /**
     * Determine whether the transaksiPetani can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TransaksiPetani  $model
     * @return mixed
     */
    public function view(User $user, TransaksiPetani $model)
    {
        return $user->hasPermissionTo('view transaksipetanis');
    }

    /**
     * Determine whether the transaksiPetani can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create transaksipetanis');
    }

    /**
     * Determine whether the transaksiPetani can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TransaksiPetani  $model
     * @return mixed
     */
    public function update(User $user, TransaksiPetani $model)
    {
        return $user->hasPermissionTo('update transaksipetanis');
    }

    /**
     * Determine whether the transaksiPetani can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TransaksiPetani  $model
     * @return mixed
     */
    public function delete(User $user, TransaksiPetani $model)
    {
        return $user->hasPermissionTo('delete transaksipetanis');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TransaksiPetani  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete transaksipetanis');
    }

    /**
     * Determine whether the transaksiPetani can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TransaksiPetani  $model
     * @return mixed
     */
    public function restore(User $user, TransaksiPetani $model)
    {
        return false;
    }

    /**
     * Determine whether the transaksiPetani can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TransaksiPetani  $model
     * @return mixed
     */
    public function forceDelete(User $user, TransaksiPetani $model)
    {
        return false;
    }
}
