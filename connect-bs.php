<?php

namespace bseries;

use bseries\api\src\Client,

$provider = new Rtransat\OAuth2\Client\Provider\Betaseries([
    'clientId'          => '3f440d5441a9',
    'clientSecret'      => '6bfddc2089b2e469806abe6bc899f01c',
    'redirectUri'       => 'http://localhost/callback_url.php'
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

$betaseries = new \bseries\php-betaseries-api-master\src\Betaseries('3f440d5441a9', 'TOKEN_UTILISATEUR')
$client = new \bseries\php-betaseries-api-master\src\Client($betaseries);

?>
