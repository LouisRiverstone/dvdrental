<?php
/** caminho no server para o sistema **/
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');
if ( !defined('BASEURL') )
    define('BASEURL', '/');
/** caminhos dos templates de header, menu e footer **/
define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
define('MENU_TEMPLATE', ABSPATH . 'inc/menu.php');
define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');








?>