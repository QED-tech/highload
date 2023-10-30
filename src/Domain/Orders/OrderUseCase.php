<?php

declare(strict_types=1);

namespace App\Domain\Orders;

use App\Domain\Orders\Requests\SaveAsyncFromFileInput;
use Generator;
use Psr\Http\Message\StreamInterface;

class OrderUseCase
{

    public function __construct(private OrdersService $ordersService)
    {
    }

    public function saveAsyncFromFile(SaveAsyncFromFileInput $input): void
    {
        foreach ($this->readCsv($input->getFile()->getStream()) as $orderRow) {
            $this->ordersService->saveAsync(
                new Order(
                    $orderRow[0],
                    $orderRow[1],
                    intval($orderRow[2]
                    ),
                )
            );
        }
    }


    private function readCsv(StreamInterface $stream): Generator
    {
        $resource = $stream->detach();
        //skip header
        fgetcsv($resource);

        while (($row = fgetcsv($resource))) {
            yield $row;
        }

        fclose($resource);
    }
}