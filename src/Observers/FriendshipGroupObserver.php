<?php

namespace Multicaret\Acquaintances\Observers;

use Multicaret\Acquaintances\Models\FriendFriendshipGroups;

class FriendshipGroupObserver
{
    /**
     * Handle the friend friendship groups "creating" event.
     *
     * @param  \Multicaret\Acquaintances\Models\FriendFriendshipGroups  $friendFriendshipGroups
     * @return void
     */
    public function creating(FriendFriendshipGroups $friendFriendshipGroups)
    {
        //
    }
}
