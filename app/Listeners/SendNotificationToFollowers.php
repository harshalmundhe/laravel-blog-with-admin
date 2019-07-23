<?php

namespace App\Listeners;

use App\Events\CreatePost;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationToFollowers
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreatePost  $event
     * @return void
     */
    public function handle(CreatePost $event)
    {
        Mail::send([], [], function ($message) {
            $message->to('harshal.mundhe@dinerosoftware.com')
              ->subject('Test Mail')
              ->setBody('Hi, welcome user!')
              ->setBody('<h1>Hi, welcome user!</h1>', 'text/html'); 
          });
    }
}
