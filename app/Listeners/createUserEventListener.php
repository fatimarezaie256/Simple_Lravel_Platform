<?php

namespace App\Listeners;

use App\Events\createUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;

class createUserEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //

    }

    /**
     * Handle the event.
     */
    public function handle(createUserEvent $event): void
    {
        //
        $customer = $event->customer;
       $user = User::create([
            "name"=>$customer->name,
            "email"=>$customer->email,
            "password"=>bcrypt("password123"),
            "user_type"=>"customer",
        ]);
        $customer->user_id = $user->id;
        $customer->save();

    }
}
