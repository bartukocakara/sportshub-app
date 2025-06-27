<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageTemplate extends Model
{
    /** @use HasFactory<\Database\Factories\MessageTemplateFactory> */
    use HasFactory, UUID;

    protected $fillable = ['code', 'type', 'subject', 'body'];

    public static function resolve(string $code, array $variables = []): array
    {
        $template = self::where('code', $code)->firstOrFail();

        $body = str_replace(array_map(fn($k) => '{' . $k . '}', array_keys($variables)), array_values($variables), $template->body);
        $subject = $template->subject
            ? str_replace(array_map(fn($k) => '{' . $k . '}', array_keys($variables)), array_values($variables), $template->subject)
            : null;

        return [
            'body' => $body,
            'subject' => $subject,
            'type' => $template->type,
        ];
    }
}
