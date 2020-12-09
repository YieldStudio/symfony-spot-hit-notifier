Spot-Hit Notifier
====================

Provides Spot-Hit integration for Symfony Notifier.

DSN example
-----------

```
// .env file
SPOT_HIT_DSN=spothit://TOKEN@default?from=FROM
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
