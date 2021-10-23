<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID', '7ac505f42d1eff5f72c3'),
        'client_secret' => env('GITHUB_CLIENT_SECRET', '91ec81720a27cafa3dbeba21d1922fa2c184fce1'),
        'redirect' => 'http://localhost:9090',
        'url' => 'https://github.com/login/oauth/authorize'
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID', '560336331353661'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET', '8186971e54a726956a10c5ed14aae3a2'),
        'redirect' => 'https://c80c6f458d49.ngrok.io/',
        'url' => 'https://www.facebook.com/v3.3/dialog/oauth'
    ],
];
