<?php

namespace App\Messaging\Parsers;

use App\Messaging\Contracts\ResponseParserInterface;
use Illuminate\Http\Client\Response;

class TwilioResponseParser implements ResponseParserInterface
{
    public function parseToken(Response $response): string
    {
        return $response->json('access_token');
    }

    public function isSuccess(Response $response): bool
    {
        return $response->successful() && $response->json('status') === 'sent';
    }

    public function getErrorMessage(Response $response) : ?string
    {
        return $response->json('message') ?? 'Unknown Twilio Error';
    }
}
