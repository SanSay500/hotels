<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Offer;
use Illuminate\Auth\Access\HandlesAuthorization;

class OfferPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Offer $offer){
        return $offer->user_id === $user->id;
    }

    public function delete(User $user, Offer $offer){
        return $this->update($user, $offer);
    }
    public function before(User $user, $ability)
    {
        if ($user->hasAccess('private-offer-resources')) {
            return true;
        }
    }


}
