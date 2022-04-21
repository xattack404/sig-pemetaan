<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ItemTransaksiPetani;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemTransaksiPetaniPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the itemTransaksiPetani can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list itemtransaksipetanis');
    }

    /**
     * Determine whether the itemTransaksiPetani can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ItemTransaksiPetani  $model
     * @return mixed
     */
    public function view(User $user, ItemTransaksiPetani $model)
    {
        return $user->hasPermissionTo('view itemtransaksipetanis');
    }

    /**
     * Determine whether the itemTransaksiPetani can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create itemtransaksipetanis');
    }

    /**
     * Determine whether the itemTransaksiPetani can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ItemTransaksiPetani  $model
     * @return mixed
     */
    public function update(User $user, ItemTransaksiPetani $model)
    {
        return $user->hasPermissionTo('update itemtransaksipetanis');
    }

    /**
     * Determine whether the itemTransaksiPetani can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ItemTransaksiPetani  $model
     * @return mixed
     */
    public function delete(User $user, ItemTransaksiPetani $model)
    {
        return $user->hasPermissionTo('delete itemtransaksipetanis');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ItemTransaksiPetani  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete itemtransaksipetanis');
    }

    /**
     * Determine whether the itemTransaksiPetani can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ItemTransaksiPetani  $model
     * @return mixed
     */
    public function restore(User $user, ItemTransaksiPetani $model)
    {
        return false;
    }

    /**
     * Determine whether the itemTransaksiPetani can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ItemTransaksiPetani  $model
     * @return mixed
     */
    public function forceDelete(User $user, ItemTransaksiPetani $model)
    {
        return false;
    }
}
