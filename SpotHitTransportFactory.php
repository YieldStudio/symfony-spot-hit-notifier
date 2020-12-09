<?php

namespace YieldStudio\Notifier\SpotHit;

use Symfony\Component\Notifier\Exception\UnsupportedSchemeException;
use Symfony\Component\Notifier\Transport\AbstractTransportFactory;
use Symfony\Component\Notifier\Transport\Dsn;
use Symfony\Component\Notifier\Transport\TransportInterface;

/**
 * @author James Hemery <james@yieldstudio.fr>
 */
final class SpotHitTransportFactory extends AbstractTransportFactory
{
    /**
     * @param Dsn $dsn
     * @return SpotHitTransport
     */
    public function create(Dsn $dsn): TransportInterface
    {
        $scheme = $dsn->getScheme();
        $token = $this->getUser($dsn);
        $from = $dsn->getOption('from');
        $host = 'default' === $dsn->getHost() ? null : $dsn->getHost();

        if ('spothit' === $scheme) {
            return (new SpotHitTransport($token, $from, $this->client, $this->dispatcher))->setHost($host);
        }

        throw new UnsupportedSchemeException($dsn, 'spothit', $this->getSupportedSchemes());
    }

    protected function getSupportedSchemes(): array
    {
        return ['spothit'];
    }
}
