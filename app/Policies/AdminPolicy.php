<?php

namespace App\Policies;

use App\SuperAdmin;
use App\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function view(User $user, Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $superAdmins = SuperAdmin::all();

        foreach ($superAdmins as $superAdmin) {
            $emails = "'$superAdmin->email'";
            return $emails;
        }

        return in_array($user->email, [
            $emails,
        ]);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function update(User $user, Admin $admin)
    {
        $superAdmins = SuperAdmin::all();

        foreach ($superAdmins as $superAdmin) {
            $emails = "'$superAdmin->email'";
            return $emails;
        }

        return in_array($user->email, [
            $emails,
        ]);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function delete(User $user, Admin $admin)
    {
        $superAdmins = SuperAdmin::all();

        foreach ($superAdmins as $superAdmin) {
            $emails = "'$superAdmin->email'";
            return $emails;
        }

        return in_array($user->email, [
            $emails,
        ]);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function restore(User $user, Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function forceDelete(User $user, Admin $admin)
    {
        //
    }
}
