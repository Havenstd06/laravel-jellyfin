<?php

namespace Havenstd06\LaravelJellyfin\Traits;

use Havenstd06\LaravelJellyfin\Traits\JellyfinAPI\Accounts;
use Havenstd06\LaravelJellyfin\Traits\JellyfinAPI\Databases;
use Havenstd06\LaravelJellyfin\Traits\JellyfinAPI\Devices;
use Havenstd06\LaravelJellyfin\Traits\JellyfinAPI\Libraries;
use Havenstd06\LaravelJellyfin\Traits\JellyfinAPI\Logs;
use Havenstd06\LaravelJellyfin\Traits\JellyfinAPI\Medias;
use Havenstd06\LaravelJellyfin\Traits\JellyfinAPI\Playlists;
use Havenstd06\LaravelJellyfin\Traits\JellyfinAPI\Friends;
use Havenstd06\LaravelJellyfin\Traits\JellyfinAPI\Resources;
use Havenstd06\LaravelJellyfin\Traits\JellyfinAPI\Servers;
use Havenstd06\LaravelJellyfin\Traits\JellyfinAPI\Sessions;
use Havenstd06\LaravelJellyfin\Traits\JellyfinAPI\Shared;
use Havenstd06\LaravelJellyfin\Traits\JellyfinAPI\System;
use Havenstd06\LaravelJellyfin\Traits\JellyfinAPI\Translations;
use Havenstd06\LaravelJellyfin\Traits\JellyfinAPI\Users;

trait JellyfinAPI
{
    use Libraries;
    use System;
    use Users;
}