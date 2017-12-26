<?php

namespace Betaseries\Api;

class Messages extends AbstractApi
{
    /**
     * Récupère une discussion identifiée par l'ID du premier message.
     * Token utilisateur nécessaire
     *
     * @param int $id ID du premier message de la discussion
     * @return mixed
     */
    public function discussion($id)
    {
        return $this->get('messages/discussion', [
            'id' => $id,
        ]);
    }

    /**
     * Récupère la boîte de réception du membre identifié, par pages de 20.
     * Token utilisateur nécessaire
     *
     * @param int $page Numéro de la page
     * @return mixed
     */
    public function inbox($page = 1)
    {
        return $this->get('messages/inbox', [
            'page' => $page,
        ]);
    }

    /**
     * Supprime un message que vous avez écrit.
     * Token utilisateur nécessaire
     *
     * @param int $id ID du message à supprimer — Si c'est le premier d'une discussion, toute la discussion est supprimée
     * @return mixed
     */
    public function removeMessage($id)
    {
        return $this->delete('messages/message', [
            'id' => $id,
        ]);
    }

    /**
     * Envoie un message à un autre membre du site.
     * Token utilisateur nécessaire
     *
     * @param string|null $to ID du membre destinataire (obligatoire si premier message)
     * @param string $text Texte du message
     * @param string|null $title Titre du message (obligatoire si premier message)
     * @param int|null $id ID du premier message de la discussion (facultatif)
     * @return mixed
     */
    public function message($to = null, $text, $title = null, $id = null)
    {
        return $this->post('messages/message', [
            'to' => $to,
            'text' => $text,
            'title' => $title,
            'id' => $id,
        ]);
    }

    /**
     * Marque un message comme lu.
     * Token utilisateur nécessaire
     *
     * @param int $id ID du message à marquer comme lu
     * @return mixed
     */
    public function read($id)
    {
        return $this->post('messages/read', [
            'id' => $id,
        ]);
    }
}
