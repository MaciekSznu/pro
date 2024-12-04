<?php
/**
 * Convert Vimeo URL.
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

/**
 * Convert Vimeo URL.
 *
 * @param string $url   Url for the vimeo asset.
 */

function convert_vimeo_url( $url ) {
    $parsedUrl = parse_url( $url );
    $path = $parsedUrl['path'];
    $pathSegments = explode('/', trim($path, '/'));
    $videoId = end( $pathSegments );
    $embeddedUrl = "https://player.vimeo.com/video/" . $videoId . "?autoplay=1&loop=1";

    echo $embeddedUrl;
}