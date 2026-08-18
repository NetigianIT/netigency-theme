<?php

namespace App\Support;

use Mews\Purifier\Facades\Purifier;
use Throwable;

class HtmlCleaner
{
    public static function clean(?string $html): string
    {
        if ($html === null || $html === '') {
            return '';
        }

        $previous = set_error_handler(static function (int $severity, string $message, string $file): bool {
            if ($severity === E_USER_WARNING && str_contains($file, 'htmlpurifier')) {
                return true;
            }

            return false;
        });

        try {
            return (string) Purifier::clean($html);
        } catch (Throwable $exception) {
            if (str_contains($exception->getMessage(), 'htmlpurifier')
                || str_contains($exception->getMessage(), 'not supported')) {
                return $html;
            }

            throw $exception;
        } finally {
            if ($previous !== null) {
                set_error_handler($previous);
            } else {
                restore_error_handler();
            }
        }
    }
}
