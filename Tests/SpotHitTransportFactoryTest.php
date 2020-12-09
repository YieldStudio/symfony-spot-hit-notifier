<?php

namespace YieldStudio\Notifier\SpotHit\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Notifier\Exception\UnsupportedSchemeException;
use Symfony\Component\Notifier\Transport\Dsn;
use YieldStudio\Notifier\SpotHit\SpotHitTransportFactory;

final class SpotHitTransportFactoryTest extends TestCase
{
    public function testCreateWithDsn(): void
    {
        $factory = $this->initFactory();

        $dsn = 'spothit://api_token@default?from=MyCompany';
        $transport = $factory->create(Dsn::fromString($dsn));
        $transport->setHost('host.test');

        $this->assertSame('spothit://host.test?from=MyCompany', (string) $transport);
    }

    public function testCreateWithoutFrom(): void
    {
        $factory = $this->initFactory();

        $dsn = 'spothit://api_token@default';
        $transport = $factory->create(Dsn::fromString($dsn));
        $transport->setHost('host.test');

        $this->assertSame('spothit://host.test', (string) $transport);
    }

    public function testSupportsSpotHitScheme(): void
    {
        $factory = $this->initFactory();

        $dsn = 'spothit://api_token@default?from=MyCompany';
        $dsnUnsupported = 'foobar://api_token@default?from=MyCompany';

        $this->assertTrue($factory->supports(Dsn::fromString($dsn)));
        $this->assertFalse($factory->supports(Dsn::fromString($dsnUnsupported)));
    }

    public function testNonSpotHitSchemeThrows(): void
    {
        $factory = $this->initFactory();

        $this->expectException(UnsupportedSchemeException::class);

        $dsnUnsupported = 'foobar://api_token@default?from=MyCompany';
        $factory->create(Dsn::fromString($dsnUnsupported));
    }

    private function initFactory(): SpotHitTransportFactory
    {
        return new SpotHitTransportFactory();
    }
}
