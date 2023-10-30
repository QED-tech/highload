<?php

declare(strict_types=1);

use App\Http\Handlers\OrdersFromFileLoadHandler;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$container = require __DIR__ . '/../config/container.php';

$app = AppFactory::createFromContainer($container);

$app->post("/v1/orders/load[/]", [OrdersFromFileLoadHandler::class, "handle"]);

$errorMiddleware = $app->addErrorMiddleware(
    true,
    true,
    true
);

$errorHandler = $errorMiddleware->getDefaultErrorHandler();
$errorHandler->forceContentType('application/json');

$app->run();