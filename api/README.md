# rtransat/betaseries-api #

Ce paquet permet de gérer les différentes ressources que l'API de [Betaseries](http://betaseries.com) fournit.

# Sommaire
* [Pré-requis](#requirements)
* [Commencer](#getting-started)
* [Documentation](#documentation)
* [Contribution](#contribution)

# <a name="requirements"></a>Pré-requis

* Ce paquet requiert PHP 5.5+ et Guzzle 6.0+

# <a name="getting-started"></a>Commencer

Installation
---------------

Ajoutez le paquet à votre `composer.json` et mettez à jour vos dépendances avec `composer update`:

```
"require": {
    ...
    "rtransat/betaseries-api": "^1.0.0",
},
```

Création du client
---------------

```php
$betaseries = new \Betaseries\Betaseries('VOTRE_CLE_API', 'TOKEN_UTILISATEUR')
$client = new \Betaseries\Client($betaseries);
```

Pour récupérer le **token utilisateur**, ce wrapper ne permet pas (encore) de se [connecter via OAuth2, Simili OAuth ou identification basique](http://www.betaseries.com/api/docs#identification-api).
Cependant vous pouvez utiliser le paquet suivant [rtransat/oauth2-betaseries](https://github.com/florentsorel/oauth2-betaseries) pour se connecter via OAuth2 et récupérer votre token.
Il s'agit d'un provider pour le paquet [oauth2 de thephpleague](https://github.com/thephpleague/oauth2-client/blob/master/README.PROVIDERS.md) qui vous permettra de gérer la connexion OAuth2 de Betaseries.

Utilisation générale
-----------------

```php
// Affiche les informations d'une série. (Game of Thrones)
$show = $client->api('shows')->display(1161);

// Affiche les épisodes d'une série.
1161 => $id = ID de la série
1 => $season = Numéro de la saison
5 => $episode = Numéro de l'épisode
$subtitles = Affiche les sous-titres si renseigné (true ou false)
$showWithOnlyOneEpisode = $client->api('shows')->episodes(1161, 1, 5);
```

# <a name="documentation"></a>Documentation

[Méthodes de l'api betaseries](http://www.betaseries.com/api/docs).

La liste des ressources actuellement prise en charge par php-betaseries-api sont :

* [comments](http://www.betaseries.com/api/methodes/comments)
* [episodes](http://www.betaseries.com/api/methodes/episodes)
* [friends](http://www.betaseries.com/api/methodes/friends)
* [members](http://www.betaseries.com/api/methodes/members)
* [messages](http://www.betaseries.com/api/methodes/messages)
* [movies](http://www.betaseries.com/api/methodes/movies)
* [pictures](http://www.betaseries.com/api/methodes/pictures)
* [planning](http://www.betaseries.com/api/methodes/planning)
* [shows](http://www.betaseries.com/api/methodes/shows)
* [subtitles](http://www.betaseries.com/api/methodes/subtitles)
* [timeline](http://www.betaseries.com/api/methodes/timeline)

Lorsque vous souhaitez utiliser une ressource en particulier il vous suffit de le définir dans la méthode ```api()```
```php
$client->api('shows')->display($id);
```

Concernant l'utilisation des paramètres de chaque méthode, il suffit de passer les paramètres par ordre ou Betaseries les utilisent.
Vous pouvez voir [ici](https://github.com/florentsorel/php-betaseries-api/tree/master/src/Api) les différents paramètres de ce wrapper.

L'API de Betaseries permet de faire une requête vers un identifiant, si on prend le cas de la méthode display pour la ressource shows, les paramètres sont les suivants :
* id : ID de la série
* thetvdb_id : ID de la série sur TheTVDB
* imdb_id : ID de la série sur IMDB

Dans le cas de ce wrapper, seul l'id est utilisé. (Il s'agit de l'identifiant de Betaseries)

À noter que les méthodes de l'api "pictures" retourne actuellement un base64 de l'image.

# <a name="contribution"></a>Contribution

N'hésitez pas à soumettre une issue si vous trouvez un bug ou une idée d'amélioration.
Les PR sont les bienvenues (Support du standard PSR-2).