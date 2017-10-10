<?php

namespace Betaseries\Api;

class Subtitles extends AbstractApi
{
    /**
     * Affiche les sous-titres pour un épisode donné.
     *
     * @param int $id ID de l'épisode
     * @return mixed
     */
    public function episode($id)
    {
        return $this->get('subtitles/episode', [
            'id' => $id,
        ]);
    }

    /**
     * Affiche les derniers sous-titres récupérés par BetaSeries.
     *
     * @param int $number Nombre de sous-titres, maximum 100
     * @param string|null $language N'affiche que certaines langues : all|vovf|vo|vf
     * @return mixed
     */
    public function last($number = 20, $language = null)
    {
        return $this->get('subtitles/last', [
            'number' => $number,
            'language' => $language,
        ]);
    }

    /**
     * Reporte des sous-titres comme incorrects pour se faire supprimer de la liste.
     * Token utilisateur nécessaire
     *
     * @param $id ID du sous-titre
     * @param $reason Raison pour laquelle le sous-titre n'est pas correct
     * @return mixed
     */
    public function report($id, $reason)
    {
        return $this->post('subtitles/report', [
            'id' => $id,
            'reason' => $reason,
        ]);
    }

    /**
     * Affiche les sous-titres pour une série donnée.
     *
     * @param $id ID de la série
     * @param $language|null N'affiche que certaines langues : all|vovf|vo|vf
     * @return mixed
     */
    public function show($id, $language = null)
    {
        return $this->get('subtitles/show', [
            'id' => $id,
            'language' => $language,
        ]);
    }
}
