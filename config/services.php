<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '285682552166408',
        'client_secret' => 'dc982406f50d758108be68ebe6df3932',
        'redirect' => 'https://stark-falls-94610.herokuapp.com/api/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '685275255567-gkaes3i6am1sec3vcrt3p62q1lasteli.apps.googleusercontent.com',
        'client_secret' => 'pykEvKVYQ1pH3n1eYC2gBGMA',
        'redirect' => 'https://stark-falls-94610.herokuapp.com/api/auth/google/callback',
    ],

];
    