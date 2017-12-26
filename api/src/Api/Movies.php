<?php

namespace Betaseries\Api;

class Movies extends AbstractApi
{
    /**
     * Récupère le casting du film.
     *
     * @param int $id ID du film
     * @return mixed
     */
    public function characters($id)
    {
        return $this->get('movies/characters', [
            'id' => $id,
        ]);
    }

    /**
     * Ajoute un film favori sur le profil du membre identifié.
     * Token utilisateur nécessaire
     *
     * @param int $id ID du film à ajouter
     * @return mixed
     */
    public function favorite($id)
    {
        return $this->post('movies/favorite', [
            'id' => $id,
        ]);
    }

    /**
     * Supprime un film favori du profil du membre identifié.
     * Token utilisateur nécessaire
     * @param int $id ID du film à supprimer
     * @return mixed
     */
    public function removeFavorite($id)
    {
        return $this->delete('movies/favorite', [
            'id' => $id,
        ]);
    }

    /**
     * Récupère les films favoris du membre.
     *
     * @param int|null $id ID du membre, facultatif, si non renseigné utilise le membre identifié.
     * @return mixed
     */
    public function favorites($id = null)
    {
        return $this->get('movies/favorites', [
            'id' => $id,
        ]);
    }

    /**
     * Affiche la liste de tous les films.
     *
     * @param int $start Nombre de démarrage pour la liste des films
     * @param int $limit Limite du nombre de films à afficher
     * @param null $order Spécifie l'ordre de retour : alphabetical, popularity
     * @return mixed
     */
    public function lists($start = 0, $limit = 100, $order = null)
    {
        return $this->get('movies/list', [
            'start' => $start,
            'limit' => $limit,
            'order' => $order,
        ]);
    }

    /**
     * Affiche la liste de tous les films du membre.
     * Token utilisateur nécessaire
     *
     * @param int $state 0 = à voir, 1 = vu, 2 = ne veut pas voir
     * @param int $start Nombre de démarrage pour la liste des films
     * @param int $limit Limite du nombre de films à afficher (maximum 1000)
     * @param null $order Spécifie l'ordre de retour : alphabetical, popularity
     * @return mixed
     */
    public function member($state = 0, $start = 0, $limit = 100, $order = null)
    {
        return $this->get('movies/member', [
            'state' => $state,
            'start' => $start,
            'limit' => $limit,
            'order' => $order,
        ]);
    }

    /**
     * Affiche les détails d'un film à partir d'un de l'ID au choix.
     *
     * @param int $id ID du film
     * @return mixed
     */
    public function movie($id)
    {
        return $this->get('movies/movie', [
            'id' => $id,
        ]);
    }

    /**
     * Ajoute ou met à jour le film dans les films du membre.
     * Token utilisateur nécessaire
     *
     * @param int $id ID du film
     * @param bool $mail Activer les alertes e-mail
     * @param bool $twitter Activer les alertes Twitter
     * @param int $state 0 = à voir, 1 = vu, 2 = ne veut pas voir
     * @param bool $profile Afficher sur le profil
     * @param int|null $note Note donnée au film (de 1 à 5 si $state = 1)
     * @return mixed
     */
    public function addMovie($id, $mail = true, $twitter = true, $state = 0, $profile = true, $note = null)
    {
        return $this->post('movies/movie', [
            'id' => $id,
            'mail' => $mail,
            'twitter' => $twitter,
            'state' => $state,
            'profile' => $profile,
            'note' => $note,
        ]);
    }

    /**
     * Supprime un film du compte membre.
     * Token utilisateur nécessaire
     *
     * @param int $id ID du film
     * @return mixed
     */
    public function removeMovie($id)
    {
        return $this->delete('movies/movie', [
            'id' => $id,
        ]);
    }

    /**
     * Note un film.
     * Token utilisateur nécessaire
     *
     * @param int $id ID du film
     * @param int $note Note attribuée de 1 à 5
     * @return mixed
     */
    public function note($id, $note)
    {
        return $this->post('movies/note', [
            'id' => $id,
            'note' => $note,
        ]);
    }

    /**
     * Supprime une note d'un film.
     * Token utilisateur nécessaire
     *
     * @param int $id ID du film
     * @return mixed
     */
    public function removeNote($id)
    {
        return $this->delete('movies/note', [
            'id' => $id,
        ]);
    }

    /**
     * Affiche un film au hasard.
     *
     * @param int $nb Nombre de films à afficher
     * @return mixed
     */
    public function random($nb = 1)
    {
        return $this->get('movies/random', [
            'nb' => $nb,
        ]);
    }

    /**
     * Récupère les informations d'un film en fonction du nom de fichier
     *
     * @param string $file Nom du fichier à traiter
     * @return mixed
     */
    public function scraper($file)
    {
        return $this->get('movies/scraper', [
            'file' => $file,
        ]);
    }

    /**
     * Recherche un film par critères.
     *
     * @param string|null $title Titre recherché (facultatif si order=popularity)
     * @param string $order Ordre de retour (title|popularity), par défaut title
     * @param int $nbpp Nombre de résultats par page, par défaut 5, maximum 100
     * @param int $page Numéro de la page, par défaut 1
     * @return mixed
     */
    public function search($title, $order = 'title', $nbpp = 5, $page = 1)
    {
        return $this->get('movies/search', [
            'title' => $title,
            'order' => $order,
            'nbpp' => $nbpp,
            'page' => $page,
        ]);
    }

    /**
     * Récupère les films marqués similaires par les membres de BetaSeries.
     *
     * @param int $id ID du film
     * @param bool $details Retourne les détails de la série
     * @return mixed
     */
    public function similars($id, $details = false)
    {
        return $this->get('movies/similars', [
            'id' => $id,
            'details' => $details,
        ]);
    }
}
