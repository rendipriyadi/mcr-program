<?php

namespace App\Policies;

use App\Models\Ritasi;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RitasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->role === 'Admin' || $user->role === 'BP' || $user->role === 'BAS' || $user->role === 'GAM';
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ritasi  $ritasi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Ritasi $ritasi)
    {
        return $user->role === 'Admin' || ($user->role === 'BP' || $user->role === 'BAS' || $user->role === 'GAM' && $ritasi->user_id === $user->id);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, Ritasi $ritasi)
    {
        return $user->role === 'Admin' || $user->role === 'BP' || $user->role === 'BAS' || $user->role === 'GAM';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ritasi  $ritasi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Ritasi $ritasi)
    {
        return $user->role === 'Admin' || ($user->role === 'BP' || $user->role === 'BAS' || $user->role === 'GAM' && $ritasi->user_id === $user->id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ritasi  $ritasi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Ritasi $ritasi)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ritasi  $ritasi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Ritasi $ritasi)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ritasi  $ritasi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Ritasi $ritasi)
    {
        //
    }
}
