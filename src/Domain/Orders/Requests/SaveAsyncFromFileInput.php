<?php

declare(strict_types=1);

namespace App\Domain\Orders\Requests;

use Psr\Http\Message\UploadedFileInterface;

readonly class SaveAsyncFromFileInput
{
    public function __construct(private UploadedFileInterface $file)
    {
    }

    public function getFile(): UploadedFileInterface
    {
        return $this->file;
    }
}