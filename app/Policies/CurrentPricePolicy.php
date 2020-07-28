<?php

namespace App\Policies;

use App\CompanyAdmin;
use App\CurrentPrice;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CurrentPricePolicy
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
     * @param  \App\CurrentPrice  $currentPrice
     * @return mixed
     */
    public function view(User $user, CurrentPrice $currentPrice)
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
        $companyAdmins = CompanyAdmin::all();

        foreach ($companyAdmins as $companyAdmin) {
            $emails = "'$companyAdmin->email'";
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
     * @param  \App\CurrentPrice  $currentPrice
     * @return mixed
     */
    public function update(User $user, CurrentPrice $currentPrice)
    {
        $companyAdmins = CompanyAdmin::all();

        foreach ($companyAdmins as $companyAdmin) {
            $emails = "'$companyAdmin->email'";
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
     * @param  \App\CurrentPrice  $currentPrice
     * @return mixed
     */
    public function delete(User $user, CurrentPrice $currentPrice)
    {
        $companyAdmins = CompanyAdmin::all();

        foreach ($companyAdmins as $companyAdmin) {
            $emails = "'$companyAdmin->email'";
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
     * @param  \App\CurrentPrice  $currentPrice
     * @return mixed
     */
    public function restore(User $user, CurrentPrice $currentPrice)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\CurrentPrice  $currentPrice
     * @return mixed
     */
    public function forceDelete(User $user, CurrentPrice $currentPrice)
    {
        //
    }
}
