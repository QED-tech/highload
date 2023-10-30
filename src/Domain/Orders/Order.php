<?php

declare(strict_types=1);

namespace App\Domain\Orders;

class Order
{
    public function __construct(private string $uid, private string $position, private int $amount)
    {
    }

    public function getUid(): string
    {
        return $this->uid;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }
}