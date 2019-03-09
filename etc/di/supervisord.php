<?php declare(strict_types=1);

use ApiClients\Client\Supervisord\AsyncClient;
use ApiClients\Client\Supervisord\AsyncClientInterface;
use React\EventLoop\LoopInterface;
use function DI\factory;
use function DI\get;

return [
    AsyncClientInterface::class => factory(function (
        string $host,
        LoopInterface $loop
    ) {
        return AsyncClient::create(
            $host,
            $loop
        );
    })
        ->parameter('host', get('config.api-clients.supervisord.host')),
];
