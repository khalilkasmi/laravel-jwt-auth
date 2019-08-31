<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */

    'supportsCredentials' => true,
    'allowedOrigins' => ['http://localhost:8000'],
    'allowedOriginsPatterns' => [],
    'allowedHeaders' => ['Content-Type',' Authorization', 'X-Requested-With'],
    'allowedMethods' => ['GET', 'PUT', 'POST', 'DELETE', 'OPTIONS'],
    'exposedHeaders' => [],
    'maxAge' => 0,

];
