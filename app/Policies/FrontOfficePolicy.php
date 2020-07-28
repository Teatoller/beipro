<?php

namespace App\Policies;

use App\SuperAdmin;
use App\FrontOffice;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FrontOfficePolicy
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
     * @param  \App\FrontOffice  $frontOffice
     * @return mixed
     */
    public function view(User $user, FrontOffice $frontOffice)
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
     * @param  \App\FrontOffice  $frontOffice
     * @return mixed
     */
    public function update(User $user, FrontOffice $frontOffice)
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
     * @param  \App\FrontOffice  $frontOffice
     * @return mixed
     */
    public function delete(User $user, FrontOffice $frontOffice)
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
     * @param  \App\FrontOffice  $frontOffice
     * @return mixed
     */
    public function restore(User $user, FrontOffice $frontOffice)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\FrontOffice  $frontOffice
     * @return mixed
     */
    public function forceDelete(User $user, FrontOffice $frontOffice)
    {
        //
    }
}
