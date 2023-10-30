<?php

use App\Domain\Orders\OrdersService;
use App\Infrastructure\MessageBroker\MessageBus;
use App\Infrastructure\MessageBroker\MessageBusInterface;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use Psr\Container\ContainerInterface;

$containerBuilder = new DI\ContainerBuilder();

$containerBuilder->addDefinitions([
    MessageBusInterface::class => static function (ContainerInterface $container) {
        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        return new MessageBus($connection, $channel);
    },
    OrdersService::class => static function (ContainerInterface $container) {
        return new OrdersService($container->get(MessageBusInterface::class));
    }
]);

return $containerBuilder->build();