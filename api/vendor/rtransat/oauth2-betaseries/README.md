# Betaseries Provider for OAuth 2.0 Client

[![Latest Version](https://img.shields.io/github/release/florentsorel/oauth2-betaseries.svg?style=flat-square)](https://github.com/florentsorel/oauth2-betaseries/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/travis/florentsorel/oauth2-betaseries/master.svg?style=flat-square)](https://travis-ci.org/florentsorel/oauth2-betaseries)

This package provides Betaseries OAuth 2.0 support for the PHP League's [OAuth 2.0 Client](https://github.com/thephpleague/oauth2-client).

## Installation

To install, use composer:

```
composer require rtransat/oauth2-betaseries
```

## Usage

Usage is the same as The League's OAuth client, using `\Rtransat\OAuth2\Client\Provider\Betaseries` as the provider.

### Authorization Code Flow

```php
$provider = new Rtransat\OAuth2\Client\Provider\Betaseries([
    'clientId'          => '{betaseries-client-id}',
    'clientSecret'      => '{betaseries-client-secret}',
    'redirectUri'       => 'https://example.com/callback-url'
]);

if (!isset($_GET['code'])) {

    // If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl();
    header('Location: '.$authUrl);
    exit;
    
} else {

    // Try to get an access token (using the authorization code grant)
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    // Optional: Now you have a token you can look up a users profile data
    try {

        // We got an access token, let's now get the user's details
        $user = $provider->getResourceOwner($token);

        printf('Hello %s!', $user->getUsername());

    } catch (Exception $e) {

        // Failed to get user details
        exit('Oh dear...');
    }

    // Use this to interact with an API on the users behalf
    echo $token->getToken();
}
```

## Testing

``` bash
$ ./vendor/bin/phpunit
```

## License

The MIT License (MIT). Please see [License File](https://github.com/florentsorel/oauth2-betaseries/blob/master/LICENSE) for more information.