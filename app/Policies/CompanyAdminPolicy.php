<?php

namespace App\Policies;

use App\CompanyAdmin;
use App\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyAdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the admin can view any company admins.
     *
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function viewAny(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the admin can view the company admin.
     *
     * @param  \App\Admin  $admin
     * @param  \App\CompanyAdmin  $companyAdmin
     * @return mixed
     */
    public function view(Admin $admin, CompanyAdmin $companyAdmin)
    {
        //
    }

    /**
     * Determine whether the admin can create company admins.
     *
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function create(Admin $admin)
    {
        return in_array($admin->role,['admin']);
    }

    /**
     * Determine whether the admin can update the company admin.
     *
     * @param  \App\Admin  $admin
     * @param  \App\CompanyAdmin  $companyAdmin
     * @return mixed
     */
    public function update(Admin $admin, CompanyAdmin $companyAdmin)
    {
        return in_array($admin->role,['admin']);
    }

    /**
     * Determine whether the admin can delete the company admin.
     *
     * @param  \App\Admin  $admin
     * @param  \App\CompanyAdmin  $companyAdmin
     * @return mixed
     */
    public function delete(Admin $admin, CompanyAdmin $companyAdmin)
    {
        return in_array($admin->role,['admin']);
    }

    /**
     * Determine whether the admin can restore the company admin.
     *
     * @param  \App\Admin  $admin
     * @param  \App\CompanyAdmin  $companyAdmin
     * @return mixed
     */
    public function restore(Admin $admin, CompanyAdmin $companyAdmin)
    {
        //
    }

    /**
     * Determine whether the admin can permanently delete the company admin.
     *
     * @param  \App\Admin  $admin
     * @param  \App\CompanyAdmin  $companyAdmin
     * @return mixed
     */
    public function forceDelete(Admin $admin, CompanyAdmin $companyAdmin)
    {
        //
    }
}
