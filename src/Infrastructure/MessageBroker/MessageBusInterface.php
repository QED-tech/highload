<?php

declare(strict_types=1);

namespace App\Infrastructure\MessageBroker;

interface MessageBusInterface
{
    /**
     * @param Message $message
     * @return void
     */
    public function publish(Message $message): void;

    /**
     * @return void
     */
    public function shutdown(): void;
}