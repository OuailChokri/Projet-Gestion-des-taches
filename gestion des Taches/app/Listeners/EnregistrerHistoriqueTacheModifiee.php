<?php

namespace App\Listeners;

use App\Events\TacheModifiee;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EnregistrerHistoriqueTacheModifiee
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
    public function handle(TacheModifiee $event)
    {
        // Enregistrer l'historique des modifications dans la base de données
        $historique = new HistoriqueTache();
        $historique->tache_id = $event->tache->id;
        $historique->champs_modifies = $event->champsModifies;
        $historique->save();
    }
}
