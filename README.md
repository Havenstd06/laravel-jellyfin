
# Laravel Jellyfin
### A Laravel package that allows access to the API of your Jellyfin server.

<p align="center">
    <img height="200" src="https://user-images.githubusercontent.com/33732634/210449526-9026f288-0b9e-436a-b315-10af018b73e0.png" />   
</p>

## Features
The only sections available at the moment are:

* Library
* System
* User

Refer to [Jellyfin API Doc](https://api.jellyfin.org/)

## Installation

```bash
composer require havenstd06/laravel-jellyfin
```

#### Publish Assets
```bash
php artisan vendor:publish --provider="Havenstd06\LaravelJellyfin\Providers\JellyfinServiceProvider" 
```

#### Configuration
After publishing the assets, add the following to your .env files .

```env
# Jellyfin API
JELLYFIN_SERVER_URL=
JELLYFIN_TOKEN=

JELLYFIN_APPLICATION=

JELLYFIN_VALIDATE_SSL=true
```

#### Configuration File
The configuration file jellyfin.php is located in the config folder. Following are its contents when published:

```php
return [
    'server_url'        => env('JELLYFIN_SERVER_URL', ''), // Jellyfin Server URL (ex: https://[IP address]:8096 or https://domain.com)
    'token'             => env('JELLYFIN_TOKEN', ''),

    'application'       => env('JELLYFIN_APPLICATION', 'Laravel Jellyfin / v1.0'), // Jellyfin application name
    'version'           => env('JELLYFIN_VERSION', '10.8.8'), // (Jellyfin application version number)

    'validate_ssl'      => env('JELLYFIN_VALIDATE_SSL', true), // Validate SSL when creating api client.
];
```
## Usage

#### Initialization

```php
use Havenstd06\LaravelJellyfin\Services\Jellyfin as JellyfinClient;

$provider = new JellyfinClient;
```

#### Override Configuration
You can override Jellyfin API configuration by calling setApiCredentials method:

```php
$config = [
    'server_url'        => 'https://example.com',
    'token'             => 'your-token',
    
    'application'       => 'your-client-application-name', // optional
    'version'           => 'your-version', // optional
    
    'validate_ssl'      => true,
];

$provider->setApiCredentials($config);
```

<hr>

## Acknowledgements

- [Jellyfin API Doc](https://api.jellyfin.org/)

## License

[MIT](https://choosealicense.com/licenses/mit/)


## Contributing

Pull requests are welcome.  
For major changes, please open an issue first to discuss what you would like to change.  
Please make sure to update tests as appropriate.

