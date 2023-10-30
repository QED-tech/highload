<?php

declare(strict_types=1);

namespace App\Infrastructure\MessageBroker;

use JsonSerializable;
use ReturnTypeWillChange;

class Message implements JsonSerializable
{
    private array $content;

    public function __construct(array $content)
    {
        $this->content = $content;
    }

    #[ReturnTypeWillChange] public function jsonSerialize()
    {
        return json_encode($this->content);
    }
}