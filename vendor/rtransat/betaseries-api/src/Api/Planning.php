<?php

namespace Betaseries\Api;

class Planning extends AbstractApi
{
    /**
     * Affiche tous les épisodes diffusés les 8 derniers jours jusqu'aux 8 prochains jours.
     *
     * @param string|null $date Date d'origine (YYYY-MM-JJ — Facultatif, par défaut "now")
     * @param int $before Nombre de jours avant (Facultatif, par défaut 8)
     * @param int $after Nombre de jours après (Facultatif, par défaut 8)
     * @param string $type Type d'épisodes à afficher : "all" ou "premieres"
     * @return mixed
     */
    public function general($date = 'now', $before = 8, $after = 8, $type = 'all')
    {
        return $this->get('planning/general', [
            'date' => $date,
            'before' => $before,
            'after' => $after,
            'type' => $type,
        ]);
    }

    /**
     * Affiche uniquement le premier épisode des prochaines séries qui vont être diffusées.
     *
     * @return mixed
     */
    public function incoming()
    {
        return $this->get('planning/incoming');
    }

    /**
     * Affiche le planning d'un membre.
     *
     * @param int $id ID du membre (Facultatif si identifié)
     * @param bool $unseen N'affiche que les épisodes non-vus
     * @param string|null $month Affiche le planning du mois spécifié (format YYYY-MM)
     * @return mixed
     */
    public function member($id, $unseen = false, $month = null)
    {
        return $this->get('planning/member', [
            'id' => $id,
            'unseen' => $unseen,
            'month' => $month,
        ]);
    }
}
