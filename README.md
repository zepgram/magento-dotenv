# Magento Dotenv

Simple autoloader to integrate Symfony Dotenv component to Magento2.
The implementation can be found under path ``app/dotenv.php`` and can be configured safely for your needs.

# Installation

```
composer require zepgram/magento-dotenv
```

# How to

You can use it similar way as a Symfony project:
1. If .env exists, it is loaded first. In case there's no .env file but a .env.dist, this one will be loaded instead.
1. If one of the previously mentioned files contains the APP_ENV variable, the variable is populated and used to load environment-specific files hereafter. If APP_ENV is not defined in either of the previously mentioned files, dev is assumed for APP_ENV and populated by default.
1. If there's a .env.local representing general local environment variables it's loaded now.
1. If there's a .env.$env.local file, this one is loaded. Otherwise, it falls back to .env.$env.

You can freely edit ``app/dotenv.php``: this file will be not updated.

For more information you can follow the documentation:
https://symfony.com/doc/current/components/dotenv.html
