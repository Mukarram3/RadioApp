<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Plaid Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the Plaid API environment to use. Possible values are:
    | - 'sandbox' for testing
    | - 'development' for development
    | - 'production' for production
    |
    */

    'environment' => env('PLAID_ENVIRONMENT', 'sandbox'),

    /*
    |--------------------------------------------------------------------------
    | Plaid API Credentials
    |--------------------------------------------------------------------------
    |
    | Provide your Plaid API credentials here. You can get these from the Plaid
    | Dashboard (https://dashboard.plaid.com/account/keys).
    |
    */

    'client_id' => env('PLAID_CLIENT_ID'),
    'client_secret' => env('PLAID_CLIENT_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Plaid API Base URL
    |--------------------------------------------------------------------------
    |
    | The base URL for the Plaid API endpoints. You normally shouldn't need to
    | change this unless Plaid changes their API URL structure.
    |
    */

    'base_url' => 'https://api.plaid.com',
];
