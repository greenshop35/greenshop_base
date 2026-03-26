<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    */

    'connections' => [

        // 1. मुख्य स्टूडियो कनेक्शन 🌸
        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE_STUDIO', 'uqtezswj_Studio'), 
            'username' => env('DB_USERNAME', 'uqtezswj'),
            'password' => env('DB_PASSWORD', 'Mnbvcxz@1234567890'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        // 2. बिजनेस पोर्टल 💼
        'business' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'database' => env('DB_DATABASE_BUSINESS', 'uqtezswj_Business'),
            'username' => env('DB_USERNAME', 'uqtezswj'),
            'password' => env('DB_PASSWORD', 'Mnbvcxz@1234567890'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
        ],

        // 3. कस्टमर पोर्टल 🛒
        'customer' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'database' => env('DB_DATABASE_CUSTOMER', 'uqtezswj_Customer'),
            'username' => env('DB_USERNAME', 'uqtezswj'),
            'password' => env('DB_PASSWORD', 'Mnbvcxz@1234567890'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
        ],

        // 4. डिलीवरी पोर्टल 🚚
        'delivery' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'database' => env('DB_DATABASE_DELIVERY', 'uqtezswj_Delivery'),
            'username' => env('DB_USERNAME', 'uqtezswj'),
            'password' => env('DB_PASSWORD', 'Mnbvcxz@1234567890'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
        ],

        // 5. ऑफिस पोर्टल 🏢
        'office' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'database' => env('DB_DATABASE_OFFICE', 'uqtezswj_Office'),
            'username' => env('DB_USERNAME', 'uqtezswj'),
            'password' => env('DB_PASSWORD', 'Mnbvcxz@1234567890'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    */

    'migrations' => 'migrations',

];