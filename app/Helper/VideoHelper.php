<?php
namespace App\Helper;

class VideoHelper {
    /**
     * embed url
     */
    public static function embedUrl($url) {
        $videoId = self::getVideoId($url);
        return "https://www.youtube.com/embed/{$videoId}";
    }

    /**
     * get video id
     */
    public static function getVideoId($url) {
        parse_str(parse_url($url, PHP_URL_QUERY), $query);
        return $query['v'] ?? null;
    }
}