<?php

declare(strict_types=1);

namespace App\Infrastructure\MessageBroker;

use Exception;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class MessageBus implements MessageBusInterface
{
    private AMQPStreamConnection $conn;
    private AMQPChannel $ch;

    public function __construct(AMQPStreamConnection $conn, AMQPChannel $ch)
    {
        $this->conn = $conn;
        $this->ch = $ch;
    }

    public function publish(Message $message): void
    {
        $msg = new AMQPMessage();

        $this->ch->basic_publish($msg);
    }


    /**
     * @throws Exception
     */
    public function shutdown(): void
    {
        $this->ch->close();
        $this->conn->close();
    }
}