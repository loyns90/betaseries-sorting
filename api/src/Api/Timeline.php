<?php

namespace Betaseries\Api;

class Timeline extends AbstractApi
{
    /**
     * Affiche les derniers évènements des amis du membre identifié.
     * Token utilisateur nécessaire
     *
     * @param int $nbpp Nombre d'évènements par page, maximum 100
     * @param int|null $since_id ID du dernier évènement reçu
     * @param string|null $types Types d'évènements à retourner, séparés par une virgule
     * @return mixed
     */
    public function friends($nbpp = 10, $since_id = null, $types = null)
    {
        return $this->get('timeline/friends', [
            'nbpp' => $nbpp,
            'since_id' => $since_id,
            'types' => $types,
        ]);
    }

    /**
     * Affiche les derniers évènements du site.
     *
     * @param int $nbpp Nombre d'évènements par page, maximum 100
     * @param int|null $since_id ID du dernier évènement reçu
     * @param string|null $types Types d'évènements à retourner, séparés par une virgule
     * @return mixed
     */
    public function home($nbpp = 10, $since_id = null, $types = null)
    {
        return $this->get('timeline/home', [
            'nbpp' => $nbpp,
            'since_id' => $since_id,
            'types' => $types,
        ]);
    }

    /**
     * Affiche les derniers évènements du membre spécifié.
     *
     * @param int $id ID du membre
     * @param int $nbpp Nombre d'évènements par page, maximum 100
     * @param int|null $since_id ID du dernier évènement reçu
     * @param string|null $types Types d'évènements à retourner, séparés par une virgule
     * @return mixed
     */
    public function member($id = null, $nbpp = 10, $since_id = null, $types = null)
    {
        return $this->get('timeline/member', [
            'id' => $id,
            'nbpp' => $nbpp,
            'since_id' => $since_id,
            'types' => $types,
        ]);
    }
}
