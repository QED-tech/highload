<?php

declare(strict_types=1);

namespace App\Http\Handlers;

use App\Domain\Orders\OrderUseCase;
use App\Domain\Orders\Requests\SaveAsyncFromFileInput;
use App\Http\JsonResponse;
use JsonException;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UploadedFileInterface;

class OrdersFromFileLoadHandler
{
    public function __construct(
        private OrderUseCase $orderUseCase,
    )
    {

    }

    /**
     * @param Request $request
     * @return ResponseInterface
     * @throws JsonException
     */
    public function handle(Request $request): ResponseInterface
    {
        /** @var UploadedFileInterface $orders */
        $orders = $request->getUploadedFiles()['orders'];

        $this->orderUseCase->saveAsyncFromFile(
            new SaveAsyncFromFileInput($orders)
        );


        return new JsonResponse([
            'ok' => true,
        ]);
    }
}