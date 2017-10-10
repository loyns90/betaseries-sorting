<?php

namespace Betaseries\Api;

class Pictures extends AbstractApi
{
    /**
     * Retourne une image du badge (32x32).
     *
     * @param int $id ID du badge
     * @return mixed
     */
    public function badges($id)
    {
        return $this->get('pictures/badges', [
            'id' => $id,
        ], ['Content-Type' => 'image/jpeg']);
    }

    /**
     * Retourne une image du personnage.
     *
     * @param int $id ID du personnage
     * @param int $width Largeur désirée (facultatif, défaut 250)
     * @param int $height Hauteur désirée (facultatif, défaut 375)
     * @return mixed
     */
    public function characters($id, $width = 250, $height = 375)
    {
        return $this->get('pictures/characters', [
            'id' => $id,
            'width' => $width,
            'height' => $height,
        ], ['Content-Type' => 'image/jpeg']);
    }

    /**
     * Retourne une image de l'épisode.
     *
     * @param int $id ID de l'épisode
     * @param int $width Largeur désirée (facultatif)
     * @param int $height Hauteur désirée (facultatif)
     * @return mixed
     */
    public function episodes($id, $width, $height)
    {
        return $this->get('pictures/episodes', [
            'id' => $id,
            'width' => $width,
            'height' => $height,
        ], ['Content-Type' => 'image/jpeg']);
    }

    /**
     * Retourne une image du membre.
     *
     * @param int $id ID du membre
     * @param int $width Largeur désirée (facultatif)
     * @param int $height Hauteur désirée (facultatif)
     * @return mixed
     */
    public function members($id, $width, $height)
    {
        return $this->get('pictures/members', [
            'id' => $id,
            'width' => $width,
            'height' => $height,
        ], ['Content-Type' => 'image/jpeg']);
    }

    /**
     * Retourne une image du film.
     *
     * @param int $id ID du film
     * @param int $width Largeur désirée (facultatif, défaut 250)
     * @param int $height Hauteur désirée (facultatif, défaut 375)
     * @return mixed
     */
    public function movies($id, $width = 250, $height = 375)
    {
        return $this->get('pictures/movies', [
            'id' => $id,
            'width' => $width,
            'height' => $height,
        ], ['Content-Type' => 'image/jpeg']);
    }

    /**
     * Retourne une image de la série.
     *
     * @param int $id ID de la série
     * @param int $width Largeur désirée (facultatif)
     * @param int $height Hauteur désirée (facultatif)
     * @param string|null $picked Prendre l'image votée par la communauté (banner ou show)
     * @return mixed
     */
    public function shows($id, $width = null, $height = null, $picked = null)
    {
        return $this->get('pictures/shows', [
            'id' => $id,
            'width' => $width,
            'height' => $height,
            'picked' => $picked,
        ], ['Content-Type' => 'image/jpeg']);
    }
}
