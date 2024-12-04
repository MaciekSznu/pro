<?php
/**
 * Remove content editor from pages
 *
 * @package    WordPress
 * @subpackage pro
 * @since      pro 1.0
 */

function remove_content_editor() { 
    remove_post_type_support('page', 'editor');        
}
add_action('admin_head', 'remove_content_editor');
