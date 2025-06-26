<?php

namespace App\Messaging\Parsers;

use App\Messaging\Contracts\ResponseParserInterface;
use Illuminate\Http\Client\Response;

class NetGsmResponseParser implements ResponseParserInterface
{

    public function parseToken(Response $response): string
    {
        return $response->json('token');
    }

    public function isSuccess(Response $response): bool
    {
        return $response->successful() && $response->json('token') !== null;
    }

    public function getErrorMessage(Response $response): ?string
    {
        return $response->json('message') ?? 'Unknown error';
    }
}
