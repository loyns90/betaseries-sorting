<?php

namespace Betaseries\Api;

class Episodes extends AbstractApi
{
    /**
     * Affiche les informations d'un épisode.
     *
     * @param int|string $id ID de l'épisode. Vous pouvez en mettre plusieurs en les séparant par une virgule
     * @return mixed
     */
    public function display($id)
    {
        return $this->get('episodes/display', [
            'id' => $id,
        ]);
    }

    /**
     * Marque un épisode comme téléchargé.
     * Token utilisateur nécessaire
     *
     * @param int $id ID de l'épisode
     * @return mixed
     */
    public function downloaded($id)
    {
        return $this->post('episodes/downloaded', [
            'id' => $id
        ]);
    }

    /**
     * Enlève le marquage d'un épisode comme téléchargé.
     * Token utilisateur nécessaire
     *
     * @param int $id ID de l'épisode
     * @return mixed
     */
    public function removeDownloaded($id)
    {
        return $this->delete('episodes/downloaded', [
            'id' => $id
        ]);
    }

    /**
     * Récupère le dernier épisode diffusé d'une série donnée.
     * Token utilisateur nécessaire
     *
     * @param int $id ID de la série
     * @return mixed
     */
    public function latest($id)
    {
        return $this->get('episodes/latest', [
            'id' => $id
        ]);
    }

    /**
     * Récupère la liste des épisodes à voir.
     * Si le token est utilisé, $userId sera ignoré
     *
     * @param string $subtitles Affiche les épisodes avec certains sous-titres disponibles : all|vovf|vo|vf
     * @param int|null $limit Limite à un nombre d'épisodes par série
     * @param int|null $showId ID de la série
     * @param int|null $userId ID du membre
     * @param bool $specials Inclut les épisodes spéciaux dans le retour
     * @return mixed
     */
    public function lists($subtitles = 'all', $limit = null, $showId = null, $userId = null, $specials = false)
    {
        return $this->get('episodes/list', [
            'subtitles' => $subtitles,
            'limit' => $limit,
            'showId' => $showId,
            'userId' => $userId,
            'specials' => $specials,
        ]);
    }

    /**
     * Récupère le prochain épisode diffusé d'une série donnée.
     * Token utilisateur nécessaire
     *
     * @param int|string $id ID de la série. Vous pouvez en mettre plusieurs en les séparant par un virgule
     * @return mixed
     */
    public function next($id)
    {
        return $this->get('episodes/next', [
            'id' => $id,
        ]);
    }

    /**
     * Note un épisode.
     * Token utilisateur nécessaire
     *
     * @param int $id ID de l'épisode
     * @param int $note Note attribuée de 1 à 5
     * @return mixed
     */
    public function note($id, $note)
    {
        return $this->post('episodes/note', [
            'id' => $id,
            'note' => $note,
        ]);
    }

    /**
     * Supprime une note d'un épisode.
     * Token utilisateur nécessaire
     *
     * @param int $id ID de l'épisode
     * @return mixed
     */
    public function removeNote($id)
    {
        return $this->delete('episodes/note', [
            'id' => $id,
        ]);
    }

    /**
     * Récupère les informations d'un épisode en fonction du nom de fichier
     * Token utilisateur nécessaire
     *
     * @param string $file Nom du fichier à traiter
     * @return mixed
     */
    public function scraper($file)
    {
        return $this->get('episodes/scraper', [
            'file' => $file,
        ]);
    }

    /**
     * Récupère les informations d'un épisode en fonction d'informations.
     * Token utilisateur nécessaire
     *
     * @param int $show_id ID de la série pour l'épisode à chercher
     * @param int|string $number Numéro de la série, soit SxxExx soit le numéro global
     * @param bool $subtitles Si spécifié, retourne les sous-titres des épisodes
     * @return mixed
     */
    public function search($show_id, $number, $subtitles = true)
    {
        return $this->get('episodes/search', [
            'show_id' => $show_id,
            'number' => $number,
            'subtitles' => $subtitles,
        ]);
    }

    /**
     * Marque un épisode comme vu. Vous pouvez spécifier plusieurs épisodes en séparant les ID par une virgule.
     * Token utilisateur nécessaire
     *
     * @param int|string $id ID de l'épisode
     * @param bool $bulk Si bulk est spécifié, tous les épisodes précédents seront aussi marqués comme vus
     * @param bool $delete Si delete est spécifié, tous les épisodes d'après ne seront plus marqués comme vus
     * @param int|null $note Si la note est spécifiée entre 1 et 5, donne une note à l'épisode
     * @return mixed
     */
    public function watched($id, $bulk = true, $delete = false, $note = null)
    {
        return $this->post('episodes/watched', [
            'id' => $id,
            'bulk' => $bulk,
            'delete' => $delete,
            'note' => $note,
        ]);
    }

    /**
     * Enlève le marquage d'un épisode comme vu. Vous pouvez spécifier plusieurs épisodes en séparant les ID par une virgule.
     * Token utilisateur nécessaire
     *
     * @param int|string $id ID de l'épisode
     * @return mixed
     */
    public function removeWatched($id)
    {
        return $this->delete('episodes/watched', [
            'id' => $id,
        ]);
    }
}
