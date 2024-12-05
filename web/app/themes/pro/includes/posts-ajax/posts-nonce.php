<?php
/**
 * Post nonce.
 *
 * @package    WordPress
 * @subpackage pro
 * @since      pro 1.0
 */

/**
 * Post nonce.
 */
function post_nonce() {
	$nonce = md5( 'pro-archive-ajax-functionality' );
	return $nonce;
}
