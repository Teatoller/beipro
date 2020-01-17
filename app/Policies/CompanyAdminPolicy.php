<?php

namespace App\Policies;

use App\CompanyAdmin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyAdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any company admins.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the company admin.
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
     * Determine whether the user can create company admins.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        // return in_array($user->email,['admin@total.com']);
    }

    /**
     * Determine whether the user can update the company admin.
     *
     * @param  \App\Models\User  $user
     * @param  \App\CompanyAdmin  $companyAdmin
     * @return mixed
     */
    public function update(User $user, CompanyAdmin $companyAdmin)
    {
        //
    }

    /**
     * Determine whether the user can delete the company admin.
     *
     * @param  \App\Models\User  $user
     * @param  \App\CompanyAdmin  $companyAdmin
     * @return mixed
     */
    public function delete(User $user, CompanyAdmin $companyAdmin)
    {
        //
    }

    /**
     * Determine whether the user can restore the company admin.
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
     * Determine whether the user can permanently delete the company admin.
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
