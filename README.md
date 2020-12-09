Spot-Hit Notifier
====================

Provides Spot-Hit integration for Symfony Notifier.

Installation
-----------

```
composer require yieldstudio/symfony-spot-hit-notifier
```

#### Enable the Bundle

Add following line in `bundles.php`:

```php
YieldStudio\Notifier\SpotHit\SpotHitNotifierBundle::class => ['all' => true],
```

#### Enable the Spot-Hit transport
  
Add the `spothit` chatter in `config/packages/notifier.yaml`

````yaml
framework:
    notifier:
        texter_transports:
            spothit: '%env(SPOTHIT_DSN)%'
````


#### DSN example

```
// .env file
SPOTHIT_DSN=spothit://TOKEN@default?from=FROM
```

where:
 - `TOKEN` is your Spot-Hit API key
 - `FROM` is the custom sender (3-11 letters, default is a 5 digits phone number)

Running the Tests
---------

Install the [Composer](http://getcomposer.org/) dependencies:

    git clone https://github.com/YieldStudio/symfony-spot-hit-notifier.git
    cd symfony-spot-hit-notifier
    composer update

Then run the test suite:

    composer test

## License

This bundle is released under the MIT license.
