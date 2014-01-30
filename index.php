<?php
/**
 * tinyMCE Editor - index module
 *
 * Handles establish constants to distinguish between the tinymce4 variants
 * standard, 
 * CDN (Content delivery version) hosted remote, only the language packs are needed on server,
 * or jQuery Variant (not yet realized)
 *
 * @package tinymce
 * @copyright	1999-2009 <http://cmsimple.org/>
 * @copyright	2009-2014 The CMSimple_XH developers <http://cmsimple-xh.org/?The_Team>
 * @license	http://www.gnu.org/licenses/gpl-3.0.en.html GNU GPLv3
 * @link	http://cmsimple-xh.org/
 * @since      File available since Release 1.6.0
 * @author     manu <http://www.pixolution.ch/>
 *
 */
/* utf-8 marker: הצü */

define('TINYMCE4CMSIMPLE_VERSION', '1.1 - 2014-01-30');
    
define('TINYMCE4_VARIANT','');  //TinyMCE4 fully installed
//define('TINYMCE4_VARIANT','CDN');  //TinyMCE4 externally loaded
//define('TINYMCE4_VARIANT','jQuery');  //TinyMCE4 jQuery Version not yet realized

$plugin_cf['tinymce4']['CDN_src'] ='//tinymce.cachefly.net/4.0/tinymce.min.js';
$plugin_cf['tinymce4']['CDN_host'] ='http://www.cachefly.com/';
?>