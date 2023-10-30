<?php

declare(strict_types=1);

namespace App\Domain\Orders;

interface OrderRepositoryInterface
{
    public function save(): void;
}