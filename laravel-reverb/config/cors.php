<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

'paths' => ['api/*', 'broadcasting/*', 'reverb/*'], // Include broadcasting and Reverb paths
'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
'allowed_origins' => ['http://localhost:3000'], // Your React app's origin
'allowed_headers' => ['*'], // Accept all headers
'exposed_headers' => [],
'max_age' => 0,
'supports_credentials' => false,
];