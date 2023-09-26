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
        'scheme' => 'https',
    ],
    'github' => [
        'client_id' => '46ba61f02bc5c8103a7d',
        'client_secret' => '62eb63b218e00ae7899003577b81e5af92a0716c',
        'redirect' => 'http://127.0.0.1:8000/api/auth/github/callback',
    ],

    'google' => [
        'client_id' => '516489560179-186847qa3d2ijdticd4g9fet5okgmq89.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/api/auth/google/callback',
    ],
    'facebook' => [
        'client_id' => '155537823427699',
        'client_secret' => '035c364f06196caeba3ff83ea1741e58',
        'redirect' => 'http://127.0.0.1:8000/api/auth/facebook/callback',
//        'redirect' => 'https://e0d7-154-192-204-183.ap.ngrok.io/auth/facebook/callback',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
