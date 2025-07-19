<?php

namespace App\ValueObjects;

class SwalMessage
{
    public string $title;
    public ?string $html;
    public string $icon;
    public string $confirmText;
    public string $confirmColor;
    public ?int $timer;

    public function __construct(
        string $title,
        ?string $html = null,
        string $icon = 'info',
        string $confirmText = 'OK',
        string $confirmColor = '#3085d6',
        ?int $timer = null
    ) {
        $this->title = $title;
        $this->html = $html;
        $this->icon = $icon;
        $this->confirmText = $confirmText;
        $this->confirmColor = $confirmColor;
        $this->timer = $timer;
    }

    public static function warning(string $title, ?string $html = null): self
    {
        return new self($title, $html, 'warning', __('messages.ok'), '#d33', 5000);
    }

    public static function error(string $title, ?string $html = null): self
    {
        return new self($title, $html, 'error', __('messages.ok'), '#f1416c');
    }

    public static function success(string $title, ?string $html = null): self
    {
        return new self($title, $html, 'success', __('messages.ok'), '#50cd89', 3000);
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'html' => $this->html,
            'icon' => $this->icon,
            'confirmText' => $this->confirmText,
            'confirmColor' => $this->confirmColor,
            'timer' => $this->timer,
        ];
    }
}
