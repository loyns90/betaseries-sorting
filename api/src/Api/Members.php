<?php

namespace Betaseries\Api;

class Members extends AbstractApi
{
    /**
     * Uploade et remplace l'avatar de l'utilisateur identifié.
     * Token utilisateur nécessaire
     *
     * @param string $avatar Image à utiliser pour l'avatar de l'utilisateur.
     * @return mixed
     */
    public function avatar($avatar)
    {
        return $this->post('members/avatar', [
            'avatar' => [
                'name' => 'avatar',
                'contents' => fopen($avatar, 'r')
            ]
        ], true);
    }

    /**
     * Supprime l'avatar de l'utilisateur identifié.
     * Token utilisateur nécessaire
     *
     * @return mixed
     */
    public function removeAvatar()
    {
        return $this->delete('members/avatar');
    }

    /**
     * Affiche les badges du membre.
     *
     * @param int $id ID du membre
     * @return mixed
     */
    public function badges($id)
    {
        return $this->get('members/badges', [
            'id' => $id,
        ]);
    }

    /**
     * Détruit le token actif.
     * Token utilisateur nécessaire
     *
     * @return mixed
     */
    public function destroy()
    {
        return $this->post('members/destroy');
    }

    /**
     * Renvoie les informations d'un membre, du membre identifié par défaut.
     * Token utilisateur nécessaire si $id est null
     *
     * @param int|null $id ID du membre
     * @param bool $summary N'affiche que les informations et pas les séries / films du compte
     * @param string|null N'affiche que les films (valeur movies) ou les séries (shows)
     * @return mixed
     */
    public function infos($id = null, $summary = false, $only = null)
    {
        return $this->get('members/infos', [
            'id' => $id,
            'summary' => $summary,
            'only' => $only
        ]);
    }

    /**
     * Vérifie que le token est actif.
     * Token utilisateur nécessaire
     *
     * @return mixed
     */
    public function isActive()
    {
        return $this->get('members/is_active');
    }

    /**
     * Envoie un e-mail pour réinitialiser le mot de passe.
     *
     * @param string $find Adresse e-mail ou nom de l'utilisateur
     * @return mixed
     */
    public function lost($find)
    {
        return $this->post('members/lost', [
            'find' => $find,
        ]);
    }

    /**
     * Affiche les dernières notifications du membre.
     * Types : badge, banner, bugs, character, commentaire, dons, episode, facebook, film, forum, friend, message, quizz, recommend, site, subtitles, video.
     * Token utilisateur nécessaire
     *
     * @param int|null $since_id Dernier ID
     * @param int $number Nombre de notifications, maximum 100
     * @param string $sort Tri descendant ou ascendant (ASC ou DESC)
     * @param string|null $types Retourner uniquement certains types séparés par une virgule
     * @param bool $auto_delete Suppression automatique des notifications
     * @return mixed
     */
    public function notifications($since_id = null, $number = 10, $sort = 'DESC', $types = null, $auto_delete = false)
    {
        return $this->get('members/notifications', [
            'since_id' => $since_id,
            'number' => $number,
            'sort' => $sort,
            'types' => $types,
            'auto_delete' => $auto_delete,
        ]);
    }

    /**
     * Modifie une option de l'utilisateur.
     * Token utilisateur nécessaire
     *
     * @param string $name Nom de l'option (downloaded, global, notation, timelag, friendship)
     * @param bool|string $value Valeur de l'option (1 ou 0, pour friendship : open|requests|friends|nobody)
     * @return mixed
     */
    public function option($name, $value)
    {
        return $this->post('members/option', [
            'name' => $name,
            'value' => $value,
        ]);
    }

    /**
     * Récupère les options (sous-titres) du membre.
     * Token utilisateur nécessaire
     *
     * @return mixed
     */
    public function options()
    {
        return $this->get('members/options');
    }

    /**
     * Recherche des membres.
     *
     * @param string $login Nom de l'utilisateur, 2 caractères minimum. Vous pouvez utiliser % comme wildcard
     * @param int $limit Nombre de résultats à retourner
     * @return mixed
     */
    public function search($login, $limit = 10)
    {
        return $this->get('members/search', [
            'login' => $login,
            'limit' => $limit,
        ]);
    }

    /**
     * Crée un nouveau compte membre sur BetaSeries.
     *
     * @param string $login Nom d'utilisateur
     * @param string|null $password Mot de passe en MD5 — Facultatif : S'il n'est pas fourni il sera généré et envoyé dans l'e-mail
     * @param string $email Adresse e-mail
     * @return mixed
     */
    public function signup($login, $password, $email)
    {
        return $this->post('members/signup', [
            'login' => $login,
            'password' => md5($password),
            'email' => $email,
        ]);
    }

    /**
     * Cherche les membres parmi les amis du compte.
     * Token utilisateur nécessaire
     *
     * @param string|array $mails Tableau POST des adresses e-mail à chercher
     * @return mixed
     */
    public function sync($mails)
    {
        return $this->post('members/sync', [
            'mails' => $mails,
        ]);
    }

    /**
     * Retourne les possibilités de noms d'utilisateur libres sur BetaSeries.
     *
     * @param string $username username :
     * @return mixed
     */
    public function username($username)
    {
        return $this->get('members/username', [
            'username' => $username,
        ]);
    }
}
