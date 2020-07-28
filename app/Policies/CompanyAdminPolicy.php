<?php

namespace App\Policies;

use App\Admin;
use App\CompanyAdmin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyAdminPolicy
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
     * @param  \App\CompanyAdmin  $companyAdmin
     * @return mixed
     */
    public function view(User $user, CompanyAdmin $companyAdmin)
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
        $admins = Admin::all();

        foreach ($admins as $admin) {
            $emails = "'$admin->email'";
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
     * @param  \App\CompanyAdmin  $companyAdmin
     * @return mixed
     */
    public function update(User $user, CompanyAdmin $companyAdmin)
    {
        $admins = Admin::all();

        foreach ($admins as $admin) {
            $emails = "'$admin->email'";
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
     * @param  \App\CompanyAdmin  $companyAdmin
     * @return mixed
     */
    public function delete(User $user, CompanyAdmin $companyAdmin)
    {
        $admins = Admin::all();

        foreach ($admins as $admin) {
            $emails = "'$admin->email'";
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
     * @param  \App\CompanyAdmin  $companyAdmin
     * @return mixed
     */
    public function restore(User $user, CompanyAdmin $companyAdmin)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\CompanyAdmin  $companyAdmin
     * @return mixed
     */
    public function forceDelete(User $user, CompanyAdmin $companyAdmin)
    {
        //
    }
}
