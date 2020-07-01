<?php

namespace Multicaret\Acquaintances\Observers;

use Multicaret\Acquaintances\Models\Friendship;
use Ramsey\Uuid\Uuid;

class FriendshipObserver
{
    /**
     * Handle the friendship "creating" event.
     *
     * @param  \Multicaret\Acquaintances\Models\Friendship  $friendship
     * @return void
     */
    public function creating(Friendship $friendship)
    {
        if (!$friendship->id) {
            $friendship->id = Uuid::uuid4();
        }
    }
}
