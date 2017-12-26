<?php

namespace Betaseries\Api;

class Comments extends AbstractApi
{
    /**
     * Envoie un commentaire pour l'élément spécifié.
     * Token utilisateur nécessaire
     *
     * @param string $type Type d'élément : episode|show|member|movie
     * @param int $id ID de l'élément en question
     * @param string $text Texte du commentaire
     * @param int|null $in_reply_to Si c'est une réponse, inner_id du commentaire correspondant (Facultatif)
     * @return mixed
     */
    public function comment($type, $id, $text, $in_reply_to = null)
    {
        return $this->post('comments/comment', [
            'type' => $type,
            'id' => $id,
            'text' => $text,
            'in_reply_to' => $in_reply_to,
        ]);
    }

    /**
     * Supprime un commentaire de l'utilisateur identifié.
     * Token utilisateur nécessaire
     *
     * @param int $id ID du commentaire
     * @return mixed
     */
    public function removeComment($id)
    {
        return $this->delete('comments/comment', [
            'id' => $id,
        ]);
    }

    /**
     * Récupère les commentaires pour un élément donné.
     *
     * @param string $type Type d'élément : episode|show|member|movie
     * @param int $id ID de l'élément en question
     * @param int $nbpp Nombre de commentaires par page
     * @param int|null $since_id ID du dernier commentaire reçu (Facultatif)
     * @param string $order Ordre chronologique de retour, desc ou asc
     * @param int $replies Inclure les réponses aux commentaires
     * @return mixed
     */
    public function comments($type, $id, $nbpp = 50, $since_id = null, $order = 'asc', $replies = 1)
    {
        return $this->get('comments/comments', [
            'type' => $type,
            'id' => $id,
            'nbpp' => $nbpp,
            'since_id' => $since_id,
            'order' => $order,
            'replies' => $replies,
        ]);
    }

    /**
     * Récupère les réponses d'un commentaire donné.
     *
     * @param int $id ID du commentaire
     * @param string $order Ordre chronologique de retour, desc ou asc (Défaut asc)
     * @return mixed
     */
    public function replies($id, $order = 'asc')
    {
        return $this->get('comments/replies', [
            'id' => $id,
            'order' => $order
        ]);
    }

    /**
     * Inscrit le membre aux notifications e-mail pour l'élément donné.
     * Token utilisateur nécessaire
     *
     * @param string $type Type d'élément : episode|show|member|movie
     * @param int $id ID de l'élément en question
     * @return mixed
     */
    public function subscription($type, $id)
    {
        return $this->post('comments/subscription', [
            'type' => $type,
            'id' => $id,
        ]);
    }

    /**
     * Désinscrit le membre aux notifications e-mail pour l'élément donné.
     * Token utilisateur nécessaire
     *
     * @param string $type Type d'élément : episode|show|member|movie
     * @param int $id ID de l'élément en question
     * @return mixed
     */
    public function removeSubscription($type, $id)
    {
        return $this->delete('comments/subscription', [
            'type' => $type,
            'id' => $id,
        ]);
    }
}
