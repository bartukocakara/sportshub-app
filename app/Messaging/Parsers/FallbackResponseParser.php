<?php

namespace App\Messaging\Parsers;

use App\Messaging\Contracts\ResponseParserInterface;
use Illuminate\Http\Client\Response;

class FallbackResponseParser implements ResponseParserInterface
{
    public function parseToken(Response $response): string
    {
        logger()->error('Fallback parser used : token not found', ['body' => $response->body()]);

        return '';
    }

    public function isSuccess(Response $response): bool
    {
        return false;
    }

    public function getErrorMessage(Response $response): ?string
    {
        return 'Fallback parser user unable to parse response';
    }
}
