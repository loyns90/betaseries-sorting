<?php

namespace Betaseries\Api;

class Friends extends AbstractApi
{
    /**
     * Bloque un utilisateur.
     * Token utilisateur nécessaire
     *
     * @param int $id ID du membre à bloquer
     * @return mixed
     */
    public function block($id)
    {
        return $this->post('friends/block', [
            'id' => $id,
        ]);
    }

    /**
     * Supprime le blocage d'un utilisateur.
     * Token utilisateur nécessaire
     *
     * @param int $id ID du membre à débloquer
     * @return mixed
     */
    public function unblock($id)
    {
        return $this->delete('friends/block', [
            'id' => $id,
        ]);
    }

    /**
     * Ajoute un ami dans le compte de l'utilisateur.
     * Token utilisateur nécessaire
     *
     * @param int $id ID du membre à ajouter en ami
     * @return mixed
     */
    public function friend($id)
    {
        return $this->post('friends/friend', [
            'id' => $id,
        ]);
    }

    /**
     * Supprime un ami du compte de l'utilisateur.
     * Token utilisateur nécessaire
     *
     * @param int $id ID du membre à supprimer
     * @return mixed
     */
    public function unfriend($id)
    {
        return $this->delete('friends/friend', [
            'id' => $id,
        ]);
    }

    /**
     * Récupère la liste des amis du membre.
     * Token utilisateur nécessaire
     *
     * @param int|null $id ID du membre, facultatif, si non renseigné utilise le membre identifié. Si renseigné, blocked=false.
     * @param bool $blocked Si spécifié, retourne la liste des personnes bloquées
     * @return mixed
     */
    public function lists($id = null, $blocked = false)
    {
        return $this->get('friends/list', [
            'id' => $id,
            'blocked' => $blocked,
        ]);
    }

    /**
     * Récupère la liste des demandes envoyées par l'utilisateur.
     * Token utilisateur nécessaire
     *
     * @param bool $received Si spécifié, retourne la liste des demandes reçues
     * @return mixed
     */
    public function requests($received = true)
    {
        return $this->get('friends/requests', [
            'received' => $received,
        ]);
    }
}
