<?php
namespace App\entity;

class Text
{
    public static function excerpt(string $content, int $limit = 40)
    {
        if (strlen($content) <= $limit) {
            return $content;
        }
        $lastSpace = strpos($content, ' ', $limit);
        return substr($content, 0, $lastSpace) . '...';
    }

    public static function excerptt(string $content, int $limit = 10)
    {
        if (strlen($content) <= $limit) {
            return $content;
        }
        $lastSpace = strpos($content, ' ', $limit);
        return substr($content, 0, $lastSpace) . '...';
    }
}
