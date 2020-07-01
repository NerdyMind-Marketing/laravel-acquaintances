<?php

namespace Multicaret\Acquaintances\Observers;

use Multicaret\Acquaintances\Models\InteractionRelation;

class InteractionRelationObserver
{
    /**
     * Handle the interaction relation "creating" event.
     *
     * @param  \Multicaret\Acquaintances\Models\InteractionRelation  $interactionRelation
     * @return void
     */
    public function creating(InteractionRelation $interactionRelation)
    {
        //
    }
}
