<?php

namespace Betaseries\Api;

class Shows extends AbstractApi
{
    /**
     * Archive une série dans le compte du membre.
     * Token utilisateur nécessaire
     *
     * @param int $id ID de la série
     * @return mixed
     */
    public function archive($id)
    {
        return $this->post('shows/archive', [
            'id' => $id,
        ]);
    }

    /**
     * Sort une série des archives du compte du membre.
     * Token utilisateur nécessaire
     *
     * @param int $id ID de la série
     * @return mixed
     */
    public function removeArchive($id)
    {
        return $this->delete('shows/archive', [
            'id' => $id,
        ]);
    }

    /**
     * Récupère les personnages de la série, ajoutés par les membres de BetaSeries.
     *
     * @param int $id ID de la série
     * @return mixed
     */
    public function characters($id)
    {
        return $this->get('shows/characters', [
            'id' => $id,
        ]);
    }

    /**
     * Affiche les informations d'une série.
     *
     * @param int $id ID de la série
     * @return mixed
     */
    public function display($id)
    {
        return $this->get('shows/display', [
            'id' => $id,
        ]);
    }

    /**
     * Affiche les épisodes d'une série.
     *
     * @param int $id ID de la série
     * @param int|null $season Numéro de la saison
     * @param int|null $episode Numéro de l'épisode
     * @param bool $subtitles Affiche les sous-titres
     * @return mixed
     */
    public function episodes($id, $season = null, $episode = null, $subtitles = false)
    {
        return $this->get('shows/episodes', [
            'id' => $id,
            'season' => $season,
            'episode' => $episode,
            'subtitles' => $subtitles,
        ]);
    }

    /**
     * Ajoute une série favorite sur le profil du membre identifié.
     * Token utilisateur nécessaire
     *
     * @param int $id ID de la série
     * @return mixed
     */
    public function favorite($id)
    {
        return $this->post('shows/favorite', [
            'id' => $id,
        ]);
    }

    /**
     * Supprime une série favorite du profil du membre identifié.
     * Token utilisateur nécessaire
     *
     * @param int $id ID de la série
     * @return mixed
     */
    public function removeFavorite($id)
    {
        return $this->delete('shows/favorite', [
            'id' => $id,
        ]);
    }

    /**
     * Récupère les séries favorites du membre.
     *
     * @param int|null $id ID du membre, facultatif, si non renseigné utilise le membre identifié.
     * @return mixed
     */
    public function favorites($id = null)
    {
        return $this->get('shows/favorites', [
            'id' => $id,
        ]);
    }

    /**
     * Affiche la liste de toutes les séries.
     *
     * @param string|null $order Spécifie l'ordre de retour : alphabetical, popularity, followers
     * @param int|null $since N'afficher que les séries modifiées à partir de cette date (timestamp UNIX)
     * @param string|null $starting Affiche les séries commençant par les caractères spécifiés
     * @param int $start Nombre de démarrage pour la liste des séries
     * @param int|null $limit Limite du nombre de séries à afficher
     * @return mixed
     */
    public function lists($order = null, $since = null, $starting = null, $start = 0, $limit = null)
    {
        return $this->get('shows/list', [
            'order' => $order,
            'since' => $since,
            'starting' => $starting,
            'start' => $start,
            'limit' => $limit,
        ]);
    }

    /**
     * Note une série.
     * Token utilisateur nécessaire
     *
     * @param int $id ID de la série
     * @param int $note Note attribuée de 1 à 5
     * @return mixed
     */
    public function note($id, $note)
    {
        return $this->post('shows/note', [
            'id' => $id,
            'note' => $note,
        ]);
    }

    /**
     * Supprime une note d'une série.
     * Token utilisateur nécessaire
     *
     * @param int $id ID de la série
     * @return mixed
     */
    public function removeNote($id)
    {
        return $this->delete('shows/note', [
            'id' => $id,
        ]);
    }

    /**
     * Récupère les images de la série, ajoutées par les membres de BetaSeries.
     *
     * @param int $id ID de la série
     * @return mixed
     */
    public function pictures($id)
    {
        return $this->get('shows/pictures', [
            'id' => $id,
        ]);
    }

    /**
     * Affiche une série au hasard.
     *
     * @param int $nb
     * @param bool $summary
     * @return mixed
     */
    public function random($nb = 1, $summary = false)
    {
        return $this->get('shows/random', [
            'nb' => $nb,
            'summary' => $summary,
        ]);
    }

    /**
     * Créer une recommandation d'une série d'un membre pour un ami.
     *
     * @param int $id ID de la série
     * @param int $to ID du membre ami
     * @param string|null $comments
     * @return mixed
     */
    public function recommendation($id, $to, $comments = null)
    {
        return $this->post('shows/recommendation', [
            'id' => $id,
            'to' => $to,
            'comments' => $comments,
        ]);
    }

    /**
     * Supprime une recommandation d'une série envoyée ou reçue.
     * Token utilisateur nécessaire
     *
     * @param int $id ID de la recommendation
     * @return mixed
     */
    public function removeRecommendation($id)
    {
        return $this->delete('shows/recommendation', [
            'id' => $id,
        ]);
    }

    /**
     * Change le statut d'une recommandation de série reçue.
     * Token utilisateur nécessaire
     *
     * @param int $id ID de la recommendation
     * @param string $status Status (accept ou decline)
     * @return mixed
     */
    public function editRecommendation($id, $status)
    {
        return $this->put('shows/recommendation', [
            'id' => $id,
            'status' => $status
        ]);
    }

    /**
     * Récupère les recommandations reçues par l'utilisateur identifié.
     * Token utilisateur nécessaire
     *
     * @return mixed
     */
    public function recommendations()
    {
        return $this->get('shows/recommendations');
    }

    /**
     * Recherche une série, avec les informations du membre si un token est renseigné.
     *
     * @param string $title Titre recherché
     * @param bool $summary Retourne uniquement les infos essentielles de la série
     * @param string $order Ordre de retour (title|popularity|followers)
     * @param int $nbpp Nombre de résultats par page, par défaut 5, maximum 100
     * @param int $page Numéro de la page, par défaut 1
     * @return mixed
     */
    public function search($title, $summary = false, $order = 'title', $nbpp = 5, $page = 1)
    {
        return $this->get('shows/search', [
            'title' => $title,
            'summary' => $summary,
            'order' => $order,
            'nbpp' => $nbpp,
            'page' => $page,
        ]);
    }

    /**
     * Ajoute une série dans le compte du membre.
     * Token utilisateur nécessaire
     *
     * @param int $id ID de la série
     * @param int|null $episode_id
     * @return mixed
     */
    public function show($id, $episode_id = null)
    {
        return $this->post('shows/show', [
            'id' => $id,
            'episode_id' => $episode_id,
        ]);
    }

    /**
     * Supprime une série du compte du membre.
     * Token utilisateur nécessaire
     *
     * @param int $id ID de la série
     * @return mixed
     */
    public function removeShow($id)
    {
        return $this->delete('shows/show', [
            'id' => $id,
        ]);
    }

    /**
     * Récupère les séries marquées similaires par les membres de BetaSeries.
     *
     * @param int $id ID de la série
     * @param bool $details Retourne les détails de la série
     * @return mixed
     */
    public function similars($id, $details = false)
    {
        return $this->get('shows/similars', [
            'id' => $id,
            'details' => $details
        ]);
    }

    /**
     * Met à jour les tags pour la série donnée du membre identifié.
     * Si le paramètre "tags" vaut null, ils seront supprimés.
     * Token utilisateur nécessaire
     *
     * @param int $id ID de la série
     * @param null $tags Tags de la série : Mots séparés par une virgule.
     * @return mixed
     */
    public function tags($id, $tags = null)
    {
        return $this->post('shows/tags', [
            'id' => $id,
            'tags' => $tags,
        ]);
    }

    /**
     * Récupère les vidéos associées à la série par les membres de BetaSeries.
     *
     * @param int $id ID de la série
     * @return mixed
     */
    public function videos($id)
    {
        return $this->get('shows/videos', [
            'id' => $id,
        ]);
    }
}
