<?php

namespace App\Messaging\Contracts;

use Illuminate\Http\Client\Response;

interface ResponseParserInterface
{
    public function parseToken(Response $response): string;

    public function isSuccess(Response $response): bool;

    public function getErrorMessage(Response $response): ?string;
}
