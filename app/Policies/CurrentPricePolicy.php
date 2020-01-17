<?php

namespace App\Policies;

use App\CurrentPrice;
use App\Models\User;
use App\CompanyAdmin;
use Illuminate\Auth\Access\HandlesAuthorization;

class CurrentPricePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the companyAdmin can view any current prices.
     *
     * @param  \App\CompanyAdmin  $companyAdmin
     * @return mixed
     */
    public function viewAny(CompanyAdmin $companyAdmin)
    {
        //
    }

    /**
     * Determine whether the companyAdmin can view the current price.
     *
     * @param  \App\CompanyAdmin  $companyAdmin
     * @param  \App\CurrentPrice  $currentPrice
     * @return mixed
     */
    public function view(CompanyAdmin $companyAdmin, CurrentPrice $currentPrice)
    {
        //
    }

    /**
     * Determine whether the companyAdmin can create current prices.
     *
     * @param  \App\CompanyAdmin  $companyAdmin
     * @return mixed
     */
    public function create(CompanyAdmin $companyAdmin)
    {
        return in_array($companyAdmin->role,['staff']);
    }

    /**
     * Determine whether the companyAdmin can update the current price.
     *
     * @param  \App\CompanyAdmin  $companyAdmin
     * @param  \App\CurrentPrice  $currentPrice
     * @return mixed
     */
    public function update(CompanyAdmin $companyAdmin, CurrentPrice $currentPrice)
    {
        return in_array($companyAdmin->role,['staff']);
    }

    /**
     * Determine whether the companyAdmin can delete the current price.
     *
     * @param  \App\CompanyAdmin  $companyAdmin
     * @param  \App\CurrentPrice  $currentPrice
     * @return mixed
     */
    public function delete(CompanyAdmin $companyAdmin, CurrentPrice $currentPrice)
    {
        return in_array($companyAdmin->role,['staff']);
    }

    /**
     * Determine whether the companyAdmin can restore the current price.
     *
     * @param  \App\CompanyAdmin  $companyAdmin
     * @param  \App\CurrentPrice  $currentPrice
     * @return mixed
     */
    public function restore(CompanyAdmin $companyAdmin, CurrentPrice $currentPrice)
    {
        //
    }

    /**
     * Determine whether the companyAdmin can permanently delete the current price.
     *
     * @param  \App\CompanyAdmin  $companyAdmin
     * @param  \App\CurrentPrice  $currentPrice
     * @return mixed
     */
    public function forceDelete(CompanyAdmin $companyAdmin, CurrentPrice $currentPrice)
    {
        //
    }
}
