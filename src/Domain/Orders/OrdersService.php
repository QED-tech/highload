<?php

declare(strict_types=1);

namespace App\Domain\Orders;

use App\Infrastructure\MessageBroker\Message;
use App\Infrastructure\MessageBroker\MessageBusInterface;

class OrdersService
{
    public function __construct(private MessageBusInterface $bus)
    {
    }

    public function saveAsync(Order $order): void
    {
        $this->bus->publish(
            new Message([])
        );
    }
}