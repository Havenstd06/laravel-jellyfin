<?php
/**
 * Jellyfin Setting & API Credentials
 * Created by Thomas <me@hvs.cx>.
 */

return [
    'server_url'        => env('JELLYFIN_SERVER_URL', ''), // Jellyfin Server URL (ex: https://[IP address]:8096 or https://domain.com)
    'token'             => env('JELLYFIN_TOKEN', ''),

    'application'       => env('JELLYFIN_APPLICATION', 'Laravel Jellyfin / v1.0'), // Jellyfin application name
    'version'           => env('JELLYFIN_VERSION', '10.8.8'), // (Jellyfin application version number)

    'validate_ssl'      => env('JELLYFIN_VALIDATE_SSL', true), // Validate SSL when creating api client.
];
