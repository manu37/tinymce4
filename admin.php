<?php
/**
 * tinyMCE Editor - admin module
 *
 * Handles reading and writing of plugin files - init selectors are dynamically loaded from
 * ./inits/ representation of init_.js files
 *
 * PHP version 4 and 5
 *
 * @package tinymce
 * @copyright	1999-2009 <http://cmsimple.org/>
 * @copyright	2009-2012 The CMSimple_XH developers <http://cmsimple-xh.org/?The_Team>
 * @license	http://www.gnu.org/licenses/gpl-3.0.en.html GNU GPLv3
 * @version	@CMSIMPLE_XH_VERSION@, @CMSIMPLE_XH_BUILD@
 * @version $Id: admin.php 434 2013-01-12 17:44:30Z manu37 $
 * @link	http://cmsimple-xh.org/
 * @since      File available since Release 1.6.0
 * @author     manu <http://www.pixolution.ch/>
 *
 */
/* utf-8 marker: äöü */

if (!XH_ADM ) {     return; }

initvar('tinymce4');

if ($tinymce4) {
    if (!class_exists('XH_CSRFProtection')) {
        $o.= XH_message('fail','needs CMSimple_XH Version 1.6 or higher!');
        return;
    }

    define('TINYMCE4CMSIMPLE_VERSION', '1.0 - 2014-01-08');
    
    //Helper-functions
    function tinymce_getInits() {
        global $pth;
        $inits = glob($pth['folder']['plugins'] . 'tinymce4/inits/*.js');
        
        $options = array();
        foreach ($inits as $init) {
            $temp = explode('_', basename($init, '.js'));
            if (isset($temp[1])) {
                $options[] = $temp[1];
            }
        }
        return $options;
    }

    initvar('admin');
    initvar('action');

    $plugin = basename(dirname(__FILE__), "/");
    
    if ($admin == 'plugin_config' || $admin == 'plugin_language') {
        $o .= print_plugin_admin('on');
    } else {
        $o .= print_plugin_admin('off');
    }
    
    $o .= plugin_admin_common($action, $admin, $plugin);

        
    if ($admin == '' || $admin == 'plugin_main') {
        $o .= '<script type="text/javascript" src="' . $pth['folder']['plugins'] . $plugin . '/tinymce/tinymce.min.js"></script>';
        $tinymce_version = '<script type="text/javascript">document.write(tinymce.majorVersion + " (revision " + tinymce.minorVersion + ")");</script>';
    
        $o .= '<h1>TinyMCE for CMSimple_XH</h1>';
        $o .= '<p>Version for '.CMSIMPLE_XH_VERSION.'</p>';
        $o .= '<p>Plugin version '.TINYMCE4CMSIMPLE_VERSION;
        $o .= '<p>TinyMCE version '.$tinymce_version.'  &ndash; <a href="http://www.tinymce.com/" target="_blank">http://www.tinymce.com/</a>';
        $o .= tag('br');
        $o .= 'Available language packs: cs, da, de, en, et, fr, it, nl, pl, ru, sk tw, zh.</p>';
        $o .= '<p>CMSimple_XH & Filebrowser integration';
        $o .= tag('br');
        $o .= 'up to version 1.5.6 &ndash; <a href="http://www.zeichenkombinat.de/" target="_blank">Zeichenkombinat.de</a>';
        $o .= tag('br');
        $o .= 'from &nbsp;version 1.5.7 &ndash; <a href="http://www.pixolution.ch/" target="_blank">pixolution.ch</a></p>';
        $o .=tag('br');
        $o .= '<h2>Important Notice</h2>
    <p><strong>tinymce4 is optimized for html5 documents. If you want to run it with a html4/xhtml template and have the toolbar styled nicely, add this to your template style definition:</strong></p>
    <p><strong>tinymce4 ist optimiert f&uuml;r html5 Dokumente. F&uuml;r die optimale Anzeige der Toolbar in html4/xhtml Templates , erg&auml;nze bitte den folgenden Code in den Stildefinitionen/stylesheet.css:</strong></p>
    <pre>
     .mce-ico {margin: 2px auto !important;}
     .mce-ico.mce-i-save {margin: 0 auto !important;}
     </pre>
     ';

    }
}
/*
 * EOF tinymce4/admin.php
 */
