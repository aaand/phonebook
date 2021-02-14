<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        print_r('$user');
        die();
    }*/

    public function create(User $user)
    {
        print_r('$user');
        die();
        return true;
    }

    public function edit(User $user, Contact $contact)
    {
        /*print_r($user);
        die();*/
        return false;
        return $user->id == $contact->creater;
    }

    public function update(User $user, Contact $contact)
    {
        /*print_r($user);
        die();*/
        return false;
        return $user->id == $contact->creater;
    }

    public function delete(User $user, Contact $contact)
    {
        print_r($user);
        die();
        return $user->id == $contact->creater;
    }

    public function view(User $user, Contact $contact)
    {
        print_r($user);
        die();
        return $user->id == $contact->creater;
    }
}
